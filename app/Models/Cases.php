<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cases extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];

    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function reports(){
        return $this->hasMany(Report::class,'case_id');
    }


    protected $casts=[
        'caseDate'=>'datetime',
        'ribStatusDate'=>'datetime',
        'isangeStatusDate'=>'datetime',
    ];
}
