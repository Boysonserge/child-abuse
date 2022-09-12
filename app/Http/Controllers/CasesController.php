<?php

namespace App\Http\Controllers;

use App\Models\Cases;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class CasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $cases=Cases::query()->with('users')->paginate(10);


        return view('cases.index', [
            'cases' => SpladeTable::for($cases)

                ->column('caseSummary')
                ->column('caseDate')
                ->column('caseLocation')
                ->column('ribStatus')
                ->column('isangeStatus')
        ]);

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
     * @return \Illuminate\Http\Response
     */
    public function show(Cases $cases)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function edit(Cases $cases)
    {
        //
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
        //
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
}
