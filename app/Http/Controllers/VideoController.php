<?php

namespace App\Http\Controllers;

use App\Video;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
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


    public function form()
    {
        return view('videos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
          'name' => 'required',
          'price' => 'required',
          'videoFile' => 'file|max:40000',
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
        $video->license = $request->licenses;
        $video->save();

        $this->sortCheckboxes($request,$video );
        // $category = Category::find([3, 4]);
        // $video->categories()->attach($category);

        // return dd($video);
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
      if( $request->get('categories')== 'food'){
        $category = Category::find([1]);
        $video->categories()->sync($category);
        }

      if( $request->get('categories') == 'animals'){
          $category = Category::find([2]);
          $video->categories()->sync($category);
          }
      if($request->get('categories') == 'people'){
          $category = Category::find([3]);
          $video->categories()->sync($category);
          }
      if($request->get('categories') == 'urban'){
          $category = Category::find([4]);
          $video->categories()->sync($category);
          }

          // licenses

          if( $request->get('licenses')== 'CC BY-ND'){
            $licence = Category::find([1]);
            $video->categories()->sync($category);
            }

          if( $request->get('licenses') == 'animals'){
              $category = Category::find([2]);
              $video->categories()->sync($category);
              }
          if($request->get('licenses') == 'people'){
              $category = Category::find([3]);
              $video->categories()->sync($category);
              }
          if($request->get('licenses') == 'urban'){
              $category = Category::find([4]);
              $video->categories()->sync($category);
              }

    }

    public function show(Video $video)
    {
        $videos = Video::latest()->paginate(5);
        $user = User::where('id','=', $video->user_id)->first();

        $user_uploads = Video::where('user_id','=', $user->id)->latest()->paginate(6);
        // return dd($user_upload);
        return view('videos.show',compact('video','user', 'user_uploads'));
    }

    public function download($user,$id)
    {
        $id = Video::whereId($id)->first();
        $filename = $id->videoFile;
        $filename = public_path('storage/vids/'.$filename);

        // $url = Storage::temporaryUrl(
        //     $filename, now()->addMinutes(5)
        // );
        // $url = URL::signedRoute(
        //   'download', ['video_id'=>$video->id, 'user_id'=> $video->user_id]
        // );

       //  $url = URL::temporarySignedRoute(
       //     'download', now()->addMinutes(30), ['id'=>$video->id]
       // );

        return response()->download($filename);
        // return dd($video->id);
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
            'videoFile' => 'file|max:40000',
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


}
