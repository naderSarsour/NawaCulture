<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Models\Event;
use App\Models\Enrolled;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $news_count =News::count();
        $Projects_count =8;
        $events_count =Event::count();
        $enrollments_count =Enrolled::count();


        return view('admin.index',compact('news_count','Projects_count','events_count','enrollments_count'));
    }
}
