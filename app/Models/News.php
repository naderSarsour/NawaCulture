<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;
   // protected $fillable = ['title','image','excerpt','content'];
    protected $guarded=[];
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
