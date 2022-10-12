<?php

namespace App\Exports;

use App\Models\Report;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class ReportsExport implements FromView
{
    /**
    * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function view(): View
    {
        $reports = Report::with('cases.users')->get();
        return view('export.report', compact('reports'));
    }
}
