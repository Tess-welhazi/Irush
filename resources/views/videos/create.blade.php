@extends('layouts.admin_layout.admin_layout')

<!-- identical to user page  -->

@section('content')
<div class="content-wrapper" style="padding: 3%">
  <div class="row col-md-6">

    <div class="col-lg-12 margin-tb">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Upload new video</h3>
        </div>
        <!-- /.card-header -->
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

  <form role="form" action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data">

      @csrf()

       <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Name:</strong>
                  <input type="text" name="name" class="form-control" placeholder="Name">
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
            <div class="form-group">
              <input type="file" name="imageFile" id="imageFile" value="">
              <label class="custom-file-label" for="imageFile">Choose image</label>
            </div>
          </div>

          <!-- image -->

          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>description:</strong>
                  <textarea class="form-control" style="height:150px" name="description" placeholder="description"></textarea>
              </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" name="categories" value="food" id="1">
                <label class="custom-control-label" for="1">food</label>
                <br>
              </div>

              <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" name="categories" value="animals" id="2">
                <label class="custom-control-label" for="2">animals</label>
                <br>
              </div>

              <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" name="categories" value="people" id="3">
                <label class="custom-control-label" for="3">people</label>
                <br>
              </div>

              <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" name="categories" value="urban" id="4">
                <label class="custom-control-label" for="4">urban</label>
                <br>
              </div>
            </div>

          </div>
          <p>license</p>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" name="licenses" value="CC BY-ND" id="5">
                <label class="custom-control-label" for="5">CC BY-ND</label>
                <br>
              </div>

              <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" name="licenses" value="CC BY" id="6">
                <label class="custom-control-label" for="6">CC BY</label>
                <br>
              </div>

              <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" name="licenses" value="CC BY-NC" id="7">
                <label class="custom-control-label" for="7">CC BY-NC</label>
                <br>
              </div>

              <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" name="licenses" value="CC BY-NC-SA" id="8">
                <label class="custom-control-label" for="8">CC BY-NC-SA</label>
                <br>
              </div>
            </div>

          </div>

          </div>

          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>price:</strong>
                  <input type="number" class="form-control" name="price">
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
