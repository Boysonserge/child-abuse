<?php

namespace App\Http\Controllers;

use App\Models\Cases;
use App\Http\Requests\StoreCasesRequest;
use App\Http\Requests\UpdateCasesRequest;
use App\pkg\SendMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\Facades\Toast;

class CasesController extends Controller
{
    public $cases;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        if (Auth::user()->hasRole('victim')){
            $this->cases=Cases::latest()->with('users')->where('user_id',auth()->id())->paginate(10);
        }elseif (Auth::user()->hasRole('rib')){
            $this->cases=Cases::latest()->paginate(10);
        }else{

        }
        return view('cases.index',['cases'=>$this->cases]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('cases.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $validates=$request->validate([
            'caseSummary'=>'required|string',
            'caseDescription'=>'required|string',
            'caseDate'=>'required',
            'caseLocation'=>'required|string',

        ]);
        Cases::create([
            'user_id'=>auth()->id(),
            'ribStatus'=>'pending',
            'isangeStatus'=>'pending',
            'caseSummary'=>$validates['caseSummary'],
            'caseDescription'=>$validates['caseDescription'],
            'caseDate'=>$validates['caseDate'],
            'caseLocation'=>$validates['caseLocation']
        ]);

        Toast::title('Success')
            ->message('Case created successful')
            ->autoDismiss(3);
        return redirect()->route('cases.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cases  $cases
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Cases $cases)
    {

        return view('cases.edit',['case' => $cases]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cases  $cases
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Cases $cases,$id)
    {
        $some=Cases::find($id);
        return view('cases.edit',['case' => $some]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cases $cases)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cases $cases)
    {
        //
    }


    public function approve($caseId){
        $cases=Cases::where('id',$caseId)->with('users')->first();
        $name=$cases->users()->first()->name;
        $time=now();
        $phone=$cases->users()->first()->phone;

        $message="Hello $name, your case has been approved by the RIB at $time";

        (new \App\pkg\SendMessage)->send($message,$phone);

        $cases->update([
            'ribStatus'=>'approved',
            'ribStatusDate'=>now()
        ]);

        Toast::title('Success')
            ->message('Case approved successful')
            ->autoDismiss(3);
        return redirect()->route('cases.index');
    }

    public function reject($caseId){
        $cases=Cases::where('id',$caseId)->with('users')->first();
        $name=$cases->users()->first()->name;
        $time=now();
        $phone=$cases->users()->first()->phone;


        $message="Dear $name, your case has been rejected by the Rib at $time";


        (new \App\pkg\SendMessage)->send($message,$phone);

        $cases->update([
            'ribStatus'=>'rejected',
            'ribStatusDate'=>now()
        ]);



        Toast::title('Rejected')
            ->message('Case rejected successful')
            ->autoDismiss(3)
            ->danger();
        return redirect()->route('cases.index');
    }
}
