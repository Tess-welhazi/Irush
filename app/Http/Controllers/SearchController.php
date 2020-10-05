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
        $video = Video::where('name','LIKE','%'.$q.'%')->orWhere('description','LIKE','%'.$q.'%')->paginate(15);

        if(count($video) > 0)
            return view('search')->withDetails($video)->withQuery ( $q );

        else return view ('search')->withMessage('No Details found. Try to search again !')->withQuery ( $q );

      }

      public function filter(Request $request)
        {
          $q = Request::input  ( 'q' );


          $video_alt = Video::where(function($request) use($q){
              $request->orWhere('name','LIKE','%'.$q.'%')
                    ->orWhere('description','LIKE','%'.$q.'%');
            });

          $video = $video_alt;

          $min_price=Request::input('min_price');

          if ($min_price) {

              $video->where('price','>', $min_price);
          }
          $max_price=Request::input('max_price');

          if ($max_price) {

              $video->where('price','<',$max_price);
          }
            // $request->has('category')

          if (Request::input('category')) {
                $video->where('category','=', Request::input('category'));
            }

            if (Request::input('licence')) {
                  $video->where('licence','=', Request::input('licence'));
              }

            // dd(Request::input('category'));
            // $video = Video::paginate(15);
            // $video = $video->get();
            // return $video->get();
            $video = $video->paginate(15);
            return view('search')->withDetails($video)->withQuery ( $q )
                                                      ->withMin($min_price)
                                                      ->withMax($max_price);

        }

      public function filter_comebacktothislater(Request $request)
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
