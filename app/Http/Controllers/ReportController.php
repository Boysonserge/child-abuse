<?php

namespace App\Http\Controllers;

use App\Models\Cases;
use App\Models\Report;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;

class ReportController extends Controller
{
    public function export()
    {
        $pdf = PDF::loadView('export.report');
        return $pdf->download('report.pdf');
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
        $report=Report::findOrFail($id);
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
        $report=Report::findOrFail($id);
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
