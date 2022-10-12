<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class UserExport implements FromQuery
{
    use Exportable;
    /**
    * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return User::query();
    }
}
