@extends('layouts.admin_layout.admin_layout')

<!-- identical to user page  -->

@section('content')
<div class="content-wrapper">
  <div class="row col-md-6">

    <div class="col-lg-12 margin-tb">

      <div class="card-header">
        <h3 class="card-title">Edit video</h3>
      </div>
        <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('videos.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())

  <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>
          @endforeach
        </ul>
    </div>

@endif

<div class="col-md-6">

  <form action="{{ route('videos.update',$video->id) }}" method="POST" enctype="multipart/form-data">

      @csrf

      @method('PUT')

       <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Name:</strong>
                  <input type="text" name="name" value="{{ $video->name }}" class="form-control" placeholder="Name">
              </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>description:</strong>
                  <textarea class="form-control" style="height:150px" name="description" placeholder="description">{{ $video->description }}</textarea>
              </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>price:</strong>
                  <input type="number" class="form-control" name="price">{{ $video->price }}
                  </input>
              </div>
          </div>

          <!-- upload -->
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <label for="videoFile">File input</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" id="videoFile" name="videoFile">
                  <label class="custom-file-label" for="videoFile">Choose file</label>
                </div>

              </div>
            </div>
          </div>

          <!--upload  -->

          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="categories[]" value="food" id="1">
              <label class="form-check-label" for="1">food</label>
              <br>
              <input type="checkbox" class="form-check-input" name="categories[]" value="animals" id="2">
              <label class="form-check-label" for="2">animals</label>
              <br>
              <input type="checkbox" class="form-check-input" name="categories[]" value="people" id="3">
              <label class="form-check-label" for="3">people</label>
              <br>
              <input type="checkbox" class="form-check-input" name="categories[]" value="urban" id="4">
              <label class="form-check-label" for="4">urban</label>
              <br>

            </div>

          </div>

          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
      </div>
  </form>

</div>


</div>

@endsection
