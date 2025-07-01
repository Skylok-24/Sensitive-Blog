@extends('theme.master')

@section('second-title', $blog->name)


@section('content')

    <!-- ================ contact section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (session('blogUpdateStatus'))
                        <div class="alert alert-success" role="alert">
                            {{ session('blogUpdateStatus') }}
                        </div>
                    @endif
                    <form action="{{ route('blogs.update',['blog' => $blog]) }}" class="form-contact contact_form" method="post"
                        novalidate="novalidate" enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')

                            <div class="form-group">
                            <input class="form-control border" name="name" type="text"
                                placeholder="Enter your Blog Title" value="{{ $blog->name }}">
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <input class="form-control border" name="image" id="image" type="file"
                                value="{{ old('image') }}">
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>


                        <div class="form-group">
                            <select class="form-control border" name="category_id" id="category">
                                <option value="" hidden>Select Your Category</option>
                                @if (count($categories) > 0)
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @if ($blog->id == $category->id )
                                            selected
                                        @endif  >{{ $category->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <textarea class="w-100 border" name="description" placeholder="Enter your Blog description" rows="10">{{ $blog->description }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>


                        <div class="form-group text-center text-md-right mt-3">
                            <button type="submit" class="button button--active button-contactForm">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->

@endsection
