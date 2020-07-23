<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;
use App\Category;
use Auth;
use Storage;

class VideoController extends Controller
{

    public function index()
    {
        $videos = Video::latest()->paginate(5);
        return view('videos.index',compact('videos'))
          ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        return view('videos.create');
    }


    public function store(Request $request)
    {
        $request->validate([
          'name' => 'required',
          'price' => 'required',
          'videoFile' => 'file|max:3000',
          'categories' =>'required',
        ]);

        $video= new Video();

        $request['user_id'] = Auth::user()->id;

        $video->videoFile = $this->uploadMedia($request, 'videoFile');
        $video->imageFile = $this->uploadImage($request, 'imageFile');
        $video->name = $request->name;
        $video->price = $request->price;
        $video->description = $request->description;
        $video->user_id = $request->user_id;

        $video->save();

        $this->sortCheckboxes($request,$video );
        // $category = Category::find([3, 4]);
        // $video->categories()->attach($category);

        return redirect()->route('videos.index')
          ->with('success', 'Video updloaded successfully');
    }


    public function uploadMedia(Request $request,$input_name)
    {
        if($request->hasFile($input_name)){
            $file = $request->file($input_name);
            $path = base_path().'/storage/app/public/vids';
            $filename=strtotime(date("Y-m-d h:i:sa")).'.'.$file->getClientOriginalExtension();
            $vidFilename = $filename;
            $file->move($path,$filename);
            return $filename;
        }
        else{
        	return false;
        }
    }

    public function uploadImage(Request $request,$input_name){

      if($request->hasFile($input_name)){
          $file = $request->file($input_name);
          $path = base_path().'/storage/app/public/img';
          $filename=strtotime(date("Y-m-d h:i:sa")).'.'.$file->getClientOriginalExtension();
          $vidFilename = $filename;
          $file->move($path,$filename);
          return $filename;
      }
      else{
        return false;
      }

    }

    public function sortCheckboxes(Request $request, Video $video)
    {
      if(in_array('food', $request->get('categories'))){
        $category = Category::find([1]);
        $video->categories()->syncWithoutDetaching($category);
        }

      if(in_array('animals', $request->get('categories'))){
          $category = Category::find([2]);
          $video->categories()->syncWithoutDetaching($category);
          }
      if(in_array('people', $request->get('categories'))){
          $category = Category::find([3]);
          $video->categories()->syncWithoutDetaching($category);
          }
      if(in_array('urban', $request->get('categories'))){
          $category = Category::find([4]);
          $video->categories()->syncWithoutDetaching($category);
          }
    }

    public function show(Video $video)
    {
        return view('videos.show',compact('video'));
    }

    public function download($file)
    {
      // dd( $video);
      return response()->download('storage/vids/' .$file);
    }


    public function edit(Video $video)
    {
        return view('videos.edit',compact('video'));
    }


    public function update(Request $request, Video $video)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'file' => 'file|max:3500',
        ]);

        $request['videoFile'] = $this->uploadMedia($request, 'videoFile');
        $request['imageFile'] = $this->uploadImage($request, 'imageFile');
        $video->update($request->all());

        // potential redundance problem
        $this->sortCheckboxes($request,$video );

        return redirect()->route('videos.index')
                        ->with('success','Video updated successfully');

    }


    public function destroy(Video $video)
    {
        Storage::delete('public/vids/'.$video->videoFile);
        Storage::delete('public/img/'.$video->imageFile);
        $video->delete();

        $video->categories()->detach();
        return redirect()->route('videos.index')
            ->with('success', 'Video deleted successfully');
    }

    public function favoriteVideo(Video $video)
    {
        Auth::user()->favorites()->attach($video->id);

        return back();
    }

    public function unFavoritePost(Video $video)
    {
        Auth::user()->favorites()->detach($video->id);

        return back();
    }

    public function favorited()
    {
        return (bool) Favorite::where('user_id', Auth::id())
                            ->where('video_id', $this->id)
                            ->first();
    }

    public function myFavorites()
    {
        $myFavorites = Auth::user()->favorites;

        return view('users.my_favorites', compact('myFavorites'));
    }

}
