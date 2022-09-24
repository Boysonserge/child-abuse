<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function cases()
    {
        return $this->belongsTo(Cases::class,'case_id');
    }

    public function reporter()
    {
        return $this->belongsTo(User::class,'reporter_id');
    }

    public function getReportStatusAttribute($value)
    {
        return ucfirst($value);
    }

    public function getReportDescriptionAttribute($value)
    {
        return ucfirst($value);
    }

    public function getCreatedAtAttribute($value)
    {
        return date('d-m-Y H:i:s',strtotime($value));
    }

    public function getUpdatedAtAttribute($value)
    {
        return date('d-m-Y H:i:s',strtotime($value));
    }

    public function getDeletedAtAttribute($value)
    {
        return date('d-m-Y H:i:s',strtotime($value));
    }

}
