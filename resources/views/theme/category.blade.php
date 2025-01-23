@extends('theme.master')

@section('title', 'Categories')

@section('categories-active', 'active')

@section('content')

    @include('theme.partials.hero', ['title' => 'Categories'])


    <!--================ Start Blog Post Area =================-->
    <section class="blog-post-area section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">

                        @if (count($catBlogs) > 0)
                            @foreach ($catBlogs as $blog)
                                <div class="col-md-6">
                                    <div class="single-recent-blog-post card-view w-100 h-100">
                                        <div class="thumb">
                                            <img class="card-img rounded-0 mb-5"
                                                src="{{ asset('storage') }}/blogs/{{ $blog->image }}" alt="">
                                            <ul class="thumb-info">
                                                <li><a href="#"><i class="ti-user"></i> {{ $blog->user->name }} </a></li>
                                                <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                                            </ul>
                                        </div>
                                        <div class="details mt-20">
                                            <a href="blog-single.html">
                                                <h3> {{ $blog->name }} </h3>
                                            </a>
                                            <p> {{ $blog->description }} </p>
                                            <a class="button" href="{{ route('blogs.show', parameters: ['blog' => $blog] ) }}">Read More <i class="ti-arrow-right"></i></a>
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        @endif



                    </div>


                    <div class="row">
                        <div class="col-lg-12">
                            {{ $catBlogs->render('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>

                <!-- Start Blog Post Siddebar -->
                @include('theme.partials.slider')
                <!-- End Blog Post Siddebar -->
            </div>
    </section>
    <!--================ End Blog Post Area =================-->


@endsection
