<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'isi_blog',
        'user_id',
        'image_blog',
        'head_image',
        'category',
    ];

    public function blogWriter() {
        return $this->belongsTo(
            User::class, 'user_id', 'id'
        );
    }
}
