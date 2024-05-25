<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tip extends Model
{
    protected $table = 'b_tips';
    public $timestamps = false;

    protected $fillable = [
        'tipper_id',
        'tipped_id',
        'tipper_name',
        'tipped_name',
        'amount',
        'timestamp',
        'tx',
    ];

    public function tipper()
    {
        return $this->belongsTo(Post::class, 'tipper_id');
    }

    public function tipped()
    {
        return $this->belongsTo(Post::class, 'tipped_id');
    }
}
