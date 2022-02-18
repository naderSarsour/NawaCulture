<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Event;
use App\Models\Comment;
use App\Models\Project;
use App\Models\Enrolled;
use App\Mail\ContactUsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class WebsiteController extends Controller
{
    public function index()
    {

        $news = News::all();
        $projects = Project::all();
        $events = Event::all();
       return view('website.index',compact('news','events','projects'));
    }
    public function news($id)
    {
        $news = News::findOrFail($id);
        return view('website.news-single',compact('news'));
    }

    public function events($id)
    {
        $event = Event::findOrFail($id);
        return view('website.event-single',compact('event'));
    }

    public function comments(Request $request , $id)
    {
       // $news = News::findOrFail($id);
        $request->validate([
            'comment'=>'required'
        ]);

       Comment::create([
         'comment'=>$request->comment,
         'user_id'=>Auth::id(),
         'news_id'=>$id
       ]);
        return redirect()->route('website.news',$id);
    }

    public function enrolled(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'mobile'=>'max:10|min:5',
        ]);
         $enrolled = Enrolled::create([
            'name'=>$request->name,
            'mobile'=>$request->mobile,
            'event_id'=>$id
            
     ]);
     
     return redirect()->back()->with('success','Your Registerd successfully');
     
    }
    public function contact(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'email;'=>'email',
            'subject'=>'required|string|max:50',
            'message'=>'required|max:200'
        ]);

        Mail::to('admin@nawaculture.org')->send(new ContactUsMail($request->except('_token')));
        return redirect()->back()->with('success','Your message was sent successfully');

    }

    public function projects($id)
    {
        $projects = Project::findOrFail($id);
        return view('website.project-single',compact('projects'));
    }

    }
