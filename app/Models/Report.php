<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'b_reports';
    public $timestamps = false;

    protected $fillable = [
        'ip',
        'post',
    ];
}
