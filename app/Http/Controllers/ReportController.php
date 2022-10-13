<?php

namespace App\Http\Controllers;

use App\Exports\ReportsExport;
use App\Models\Cases;
use App\Models\Report;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Facades\Excel;
use ProtoneMedia\Splade\Facades\Toast;

class ReportController extends Controller
{
    public function export()
    {
        return Excel::download(new ReportsExport, 'reports.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //Display all reports with cases
        $reports = Report::with('cases.users')->get();



        return view('report.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $report=Report::where('case_id',$id)->first();
        $severity= [
            'Common'=>'Common',
            'Medium'=>'Medium',
            'Critical'=>'Critical',

        ];
        return view('report.edit',[
            'report'=>$report,
            'id'=>$id,
            'severity'=>$severity,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $report=Report::where('case_id',$id)->first();
        $report->update($request->all());

        Toast::title('Success')
            ->message('Case approved successful')
            ->autoDismiss(3);
        return redirect()->route('cases.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



}
