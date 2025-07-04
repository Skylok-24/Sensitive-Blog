@extends('theme.master')

@section('second-title', 'My Blogs')


@section('content')

    <!-- ================ contact section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">
                  @if (session('blogDeleteStatus'))
                        <div class="alert alert-success" role="alert">
                            {{ session('blogDeleteStatus') }}
                        </div>
                    @endif
                   <table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @if(isset($blogs) && count($blogs) > 0)
        @foreach($blogs as $key => $blog)
            <tr>
            <th scope="row">{{ ++$key }}</th>
            <td><img width="80px" src="{{ asset("storage/blogs/$blog->image") }}" alt=""></td>
            <td><a href="{{ route('blogs.show',['blog' => $blog]) }}" target="_blank">{{ $blog->name }}</a></td>
            <td>
                <a target="_blank" href="{{ route('blogs.edit',['blog' => $blog]) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('blogs.destroy',['blog' => $blog]) }}" method="POST" class="d-inline" >
                  @csrf
                  @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger mr-2">Delete</button>
                </form>
            </td>
            </tr>
        @endforeach
    @endif
  </tbody>
</table>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->

@endsection
