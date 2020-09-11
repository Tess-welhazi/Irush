@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="page-header">
                <h3>My Favorites</h3>
            </div>
            @forelse ($myFavorites as $myFavorite)
                <div class="card card-default">
                    <div class="card-header">
                        {{ $myFavorite->title }}
                    </div>

                    <div class="card-body">
                        {{ $myFavorite->description }}
                    </div>
                    @if (Auth::check())
                        <div class="card-footer">
                            <favorite
                                :video={{ $myFavorite->id }}
                                :favorited={{ $myFavorite->favorited() ? 'true' : 'false' }}
                            ></favorite>
                        </div>
                    @endif
                </div>
            @empty
                <p>You have no favorite posts.</p>
            @endforelse
         </div>
    </div>
</div>
@endsection
