<?php

namespace App\Http\Controllers;
use App\Video;
use App\Category;
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
        // $this->middleware('auth');
        // this could be useful elsewhere don't delete
    }


     // let's add admin home here
    public function index()
    {
        $categories = Category::all();
        // already sorted by new
        $videos = Video::latest()->paginate(6);

        // return view('home')->withDetails($videos);
        return view('home', compact('videos'))
          ->with('i', (request()->input('page', 1) - 1) * 5)
          ->with(['categories'=> $categories,]);
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
