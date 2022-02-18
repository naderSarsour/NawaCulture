<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Models\Enrolled;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('admin.events.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.events.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'image'=>'required |image|mimes:png,jpg',
            'content'=>'required|max:500',
            'start_date'=>'required|date',
            'end_date'=>'date|required|after:start_date',
         //    'phone'=>'max:10|min:5',
         //    'price'=>'regex:09',
        ]);
     //    dd($request->except('_token'));
     //upload the file
     $imgname= time() . rand() . $request->file('image')->getClientOriginalName();
     
    
     $events = Event::create([
            'title'=>$request->title,
            'image'=>$imgname,
            'excerpt'=>$request->excerpt,
            'content'=>$request->content,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date
     ]);
     if($events){
        $request->file('image')->move(public_path('uploads'),$imgname);
     }
     return redirect()->route('admin.events.index')->with('msg','Events added successfully')->with('type','success');
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $events = Event::findOrFail($id);
        return view('admin.events.edit',compact('events'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'image'=>'nullable |image|mimes:png,jpg',
            'content'=>'required|max:500',
            'start_date'=>'required|date',
            'end_date'=>'date|required|after:start_date',
         //    'phone'=>'max:10|min:5',
         //    'price'=>'regex:09',
        ]);

        $events = Event::find($id);
        $imgname= $events->image;
        if($request->hasFile('image')){
            $imgname= 'nawa_culture_'.time() . rand() . $request->file('image')->getClientOriginalName();
        }
     //    dd($request->except('_token'));
     //upload the file
     
     
    
     $events->update([
            'title'=>$request->title,
            'image'=>$imgname,
            'excerpt'=>$request->excerpt,
            'content'=>$request->content,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date
            
     ]);
     if($request->hasFile('image')){
        $request->file('image')->move(public_path('uploads'),$imgname);
     }
     return redirect()->route('admin.events.index')->with('msg','Events Updated successfully')->with('type','info');
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::destroy($id);
        return redirect()->route('admin.events.index')->with('msg','Events deleted successfully')->with('type','danger');
    }

    public function enrollments(Request $request)
    {
            // dd($request->event);
    
            if(($request->has('event') && !is_null($request->event)) || ($request->has('name') && !is_null($request->name))) {
    
    
                if($request->has('event') && !is_null($request->event)) {
                    $enrollments = Enrolled::where('event_id', $request->event);
                }
    
    
                if($request->has('name') && !is_null($request->name)) {
                    $enrollments = Enrolled::where('name', 'like', '%'.$request->name.'%');
                }
    
    
                $enrollments = $enrollments->get();
    
            }else {
                $enrollments = Enrolled::all();
            }
    
    
            $events = Event::all();
            return view('admin.events.enrollments', compact('enrollments', 'events'));
        }}

    // if($request->has('event') && $request->event != ''){
    //    if($request->has('event') && !is_null($request->event) || 
    //    ($request->has('name') && !is_null($request->name))){
    //         if($request->has('event') && !is_null($request->event)){
    //         $enrollments = Enrolled::where('event_id',$request->event);
    //     }
    //         if($request->has('name') && !is_null($request->name)){
    //         $enrollments = Enrolled::where('name', 'like', '%'.$request->name.'%');
    
    //     }
    //     $enrollments = $enrollments->get();
  
       
    //         } else{
    //        // $enrollments = Enrolled::all();
    //     }
        

 
    //     $events = Event::all();
    //     return view('admin.events.enrollments',compact('enrollments','events'));
    // }

