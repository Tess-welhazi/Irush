<?php

namespace App\Http\Controllers;
use App\Video;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



     // let's add admin home here
    public function index()
    {
        $videos = Video::latest()->paginate(6);
        return view('home', compact('videos'))
          ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function show(Video $video)
    {
        return view('videos.show',compact('videos'));
    }

    public function adminHome()

    {
        return view('admin.admin_dashboard');
    }

    public function profile()
    {
        $videos = Video::latest()->paginate(5);
        return view('profile.profile',compact('videos'));
    }


}
