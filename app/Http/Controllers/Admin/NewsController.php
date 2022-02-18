<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $news = News::all();
        return view('Admin.news.index',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
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
         //    'phone'=>'max:10|min:5',
         //    'price'=>'regex:09',
        ]);
     //    dd($request->except('_token'));
     //upload the file
     $imgname= time() . rand() . $request->file('image')->getClientOriginalName();
     
    
     $news = News::create([
            'title'=>$request->title,
            'image'=>$imgname,
            'excerpt'=>$request->excerpt,
            'content'=>$request->content,
            
     ]);
     if($news){
        $request->file('image')->move(public_path('uploads'),$imgname);
     }
     return redirect()->route('admin.news.index')->with('msg','News added successfully')->with('type','success');
     
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
        $news = News::findOrFail($id);
        return view('admin.news.edit',compact('news'));
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
         //    'phone'=>'max:10|min:5',
         //    'price'=>'regex:09',
        ]);

        $news = News::find($id);
        $imgname= $news->image;
        if($request->hasFile('image')){
            $imgname= 'nawa_culture_'.time() . rand() . $request->file('image')->getClientOriginalName();
        }
     //    dd($request->except('_token'));
     //upload the file
     
     
    
     $news->update([
            'title'=>$request->title,
            'image'=>$imgname,
            'excerpt'=>$request->excerpt,
            'content'=>$request->content,
            
     ]);
     if($request->hasFile('image')){
        $request->file('image')->move(public_path('uploads'),$imgname);
     }
     return redirect()->route('admin.news.index')->with('msg','News Updated successfully')->with('type','success');
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       News::destroy($id);
      // News::find($id)->delete();
      return redirect()->route('admin.news.index')->with('msg','News deleted successfully')->with('type','danger');
    }
}
