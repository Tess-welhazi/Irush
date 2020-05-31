<?php

namespace App\Http\Controllers;
use App\User;
use App\Video;
use Request;
// use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
      public function basic_search(Request $request, Video $video)
      {
        $q = Request::input  ( 'q' );
        $video = Video::where('name','LIKE','%'.$q.'%')->orWhere('description','LIKE','%'.$q.'%')->get();
        if(count($video) > 0)
            return view('search')->withDetails($video)->withQuery ( $q );
        else return view ('search')->withMessage('No Details found. Try to search again !');

      }

      public function filter(Request $request, Video $video)
        {
          $video = $video->newQuery();

          $q = Request::input  ( 'q' );
          if ($request->has('name')) {
                $user->where('name', '%'.$q.'%')->orWhere('description','LIKE','%'.$q.'%');
            }

          if ($request->has('min_price') and $request->has('max_price')) {
                $video->whereBetween('price', [$request->min_price, $request->max_price]);
            }

            if ($request->has('category')) {
                $video->where('category', $request->input('category'));
            }

        }

      public function filter_comebacktothislater(Request $request, Video $video)
        {
            $video = $video->newQuery();

            // Search for a user based on their name.
            if ($request->has('resolution')) {
                $video->where('resolution', $request->input('resolution'));
            }

            // this is wrong
            if ($request->has('sort_by')) {
               $video->where('company', $request->input('company'));
            }

            // Search for a user based on their city.
            if ($request->has('licence')) {
                $video->where('licence', $request->input('licence'));
            }

            if ($request->has('category')) {
                $video->where('category', $request->input('category'));
            }

            if ($request->has('min_price') and $request->has('max_price')) {
                $video->whereBetween('price', [$request->min_price, $request->max_price]);
            }

            // Continue for all of the filters.

            // No filters have been provided, so
            // let's return all users. This is
            // bad - we should paginate in
            // reality.
            return $video->get();
        }
}
