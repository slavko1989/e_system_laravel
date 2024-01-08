<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Requests\NewsRequest;
use App\Models\Newsletter;
use App\Mail\NewsMail;


class NewsletterController extends Controller
{

    public function create(){

        return view('admin/subs.subs',
            [
                'news'=>Newsletter::all()
            ]
        );

    }

    public function store(NewsRequest $request){

        $news = new Newsletter;

        $news->name = $request->input('name');
        $news->email = $request->input('email');

        $news->save();

        Mail::send('emails.news', ['newsletter'=>$news], function($message){
            $message->to('slavko.slave1989@gmail.com','bull power it house')->subject('Subs');
        });

        return redirect()->back()->with('success','You are subscribe now');

    }

    public function delete($id){
        
        $delete = Newsletter::where('id',$id)->firstOrFail()->delete();
        return redirect()->back()->with('message','Deleted successfully');
    }
}
