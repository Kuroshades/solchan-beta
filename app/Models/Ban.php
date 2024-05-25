<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ban extends Model
{
    protected $table = 'bans';
    public $timestamps = false;

    protected $fillable = [
        'ip',
        'timestamp',
        'expire',
        'reason',
    ];
}