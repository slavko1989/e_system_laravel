<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['comment','user_id','product_id','parent_comment_id'];

    public function replies() {
        return $this->hasMany(Comment::class, 'parent_comment_id');
    }

    public function user() {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function product() {
        return $this->belongsTo(Product::class,'product_id','id');
    }

}
