<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Auth;
use App\Models\Product;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    

    public function store(CommentRequest $request,$product_id){

        if(Auth::check()){
        $user = Auth::user();
        $product = Product::find($product_id);
        

        if($product){

        $comment = new Comment;

        $comment->user_id = $user->id;
        $comment->product_id = $product->id;
        $comment->comment = $request->comment;
        $comment->parent_comment_id = $request->parent_comment_id;
        $comment->save();

    }else{
        return redirect()->back()->with('error', 'Product not found.');
    }
        }else{

            return redirect()->back()->with('error', 'You are not login.');
        }
    }
}
