<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    //o que tiver aqui sera permitido o preenchimento via Mass Assignment Way
    protected $fillable = ['title', 'description', 'body', 'is_active', 'thumb', 'slug'];

    public function user() :BelongsTo {
        return $this->belongsTo(User::class);
    }
}
