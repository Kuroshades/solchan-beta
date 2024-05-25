<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pfp extends Model
{
    protected $table = 'b_pfps';
    public $timestamps = false;

    protected $fillable = [
        'pfp_link',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'id');
    }
}
