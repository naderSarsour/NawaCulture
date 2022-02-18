<?php

namespace App\Models;

use App\Models\News;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    
    protected $guarded=[];
    public function news()
    {
        return $this->belongsTo(News::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
