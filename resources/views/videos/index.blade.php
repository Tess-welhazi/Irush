@extends( (Auth::user()->is_admin == 1) ? 'layouts.admin_layout.admin_layout' : 'layouts.app')

<!-- identical to user page  -->

@section('content')
<!DOCTYPE html>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- copied from internet  -->
    <div class="row">

    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('form') }}">test 2</a>
        </div>
    </div>

</div>

@if ($message = Session::get('success'))

    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>price</th>
        <th>filename</th>
        <th width="280px">description</th>
    </tr>

    @foreach ($videos as $video)

    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $video->name }}</td>
        <td>{{ $video->price }}</td>
        <td>{{ $video->description}}</td>
        <td>{{ $video->videoFile}}</td>
        <td>

            <form action="{{ route('videos.destroy',$video->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('videos.show',$video->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('videos.edit',$video->id) }}">Edit</a>

                @csrf

                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>

  </div>


@endsection
