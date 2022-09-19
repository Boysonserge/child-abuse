<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cases extends Model
{
    use HasFactory,SoftDeletes;

    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }


    protected $casts=[
        'caseDate'=>'datetime'
    ];
}
