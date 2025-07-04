@extends('theme.master')

@section('category-active', 'active')

@section('second-title', 'Category Page')
@section('date',
    'Home
    Category Page')


@section('content')

    <!--================ Start Blog Post Area =================-->
    <section class="blog-post-area section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        @if (isset($blogs) && count($blogs) > 0)
                            @foreach ($blogs as $blog)
                                <div class="col-md-6">
                                    <div class="single-recent-blog-post card-view">
                                        <div class="thumb">
                                            <img class="card-img rounded-0" src="{{ asset("storage/blogs/$blog->image") }}"
                                                alt="">
                                            <ul class="thumb-info">
                                                <li><a href="#"><i class="ti-user"></i>{{ $blog->user->name }}</a>
                                                </li>
                                                <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                                            </ul>
                                        </div>
                                        <div class="details mt-20">
                                            <a href="{{ route('blogs.show',['blog' => $blog]) }}">
                                                <h3>{{ $blog->name }}</h3>
                                            </a>
                                            <p>{{ $blog->description }}</p>
                                            <a class="button" href="{{ route('blogs.show',['blog' => $blog]) }}">Read More <i class="ti-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <nav class="blog-pagination justify-content-center d-flex">
                                <ul class="pagination">
                                    {{-- Previous Page Link --}}
                                    @if ($blogs->onFirstPage())
                                        <li class="page-item disabled">
                                            <span class="page-link" aria-label="Previous">
                                                <span aria-hidden="true"><i class="ti-angle-left"></i></span>
                                            </span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a href="{{ $blogs->previousPageUrl() }}" class="page-link"
                                                aria-label="Previous">
                                                <span aria-hidden="true"><i class="ti-angle-left"></i></span>
                                            </a>
                                        </li>
                                    @endif

                                    {{-- Pagination Elements --}}
                                    @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                                        @if ($page == $blogs->currentPage())
                                            <li class="page-item active"><a href="#"
                                                    class="page-link">{{ $page }}</a></li>
                                        @else
                                            <li class="page-item"><a href="{{ $url }}"
                                                    class="page-link">{{ $page }}</a></li>
                                        @endif
                                    @endforeach

                                    {{-- Next Page Link --}}
                                    @if ($blogs->hasMorePages())
                                        <li class="page-item">
                                            <a href="{{ $blogs->nextPageUrl() }}" class="page-link" aria-label="Next">
                                                <span aria-hidden="true"><i class="ti-angle-right"></i></span>
                                            </a>
                                        </li>
                                    @else
                                        <li class="page-item disabled">
                                            <span class="page-link" aria-label="Next">
                                                <span aria-hidden="true"><i class="ti-angle-right"></i></span>
                                            </span>
                                        </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

                @include('theme.partials.sidebar')
            </div>
    </section>
    <!--================ End Blog Post Area =================-->

@endsection
