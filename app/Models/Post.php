<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'b_posts';
    public $timestamps = false;

    protected $fillable = [
        'parent',
        'timestamp',
        'bumped',
        'ip',
        'name',
        'tripcode',
        'email',
        'nameblock',
        'subject',
        'message',
        'password',
        'file',
        'file_hex',
        'file_original',
        'file_size',
        'file_size_formatted',
        'image_width',
        'image_height',
        'thumb',
        'thumb_width',
        'thumb_height',
        'stickied',
        'moderated',
        'locked',
    ];

    public function pfp()
    {
        return $this->hasOne(Pfp::class, 'id');
    }

    public function tippedTips()
    {
        return $this->hasMany(Tip::class, 'tipped_id');
    }

    public function tipperTips()
    {
        return $this->hasMany(Tip::class, 'tipper_id');
    }

    public function replies()
    {
        return $this->hasMany(Post::class, 'parent', 'id');
    }
}
