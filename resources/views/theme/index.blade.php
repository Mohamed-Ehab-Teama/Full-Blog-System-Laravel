@extends('theme.master')

@section('title', 'Index')

@section('home-active', 'active')

@section('content')

    <main class="site-main">


        <!--================Hero Banner start =================-->
        <section class="mb-30px">
            <div class="container">
                <div class="hero-banner">
                    <div class="hero-banner__content">
                        <h3>Tours & Travels</h3>
                        <h1>Amazing Places on earth</h1>
                        <h4>December 12, 2018</h4>
                    </div>
                </div>
            </div>
        </section>
        <!--================Hero Banner end =================-->


        <!--================ Blog slider start =================-->
        <section>
            <div class="container">
                <div class="owl-carousel owl-theme blog-slider">

                    @if (count($allBlogs) > 0)
                        @foreach ($allBlogs as $blog)
                            <div class="card blog__slide text-center">
                                <div class="blog__slide__img">
                                    <img class="card-img rounded-0"
                                        src="{{ asset("storage/blogs/$blog->image") }}" alt="">
                                </div>
                                <div class="blog__slide__content">
                                    <a class="blog__slide__label" href="#"> {{$blog->name}} </a>
                                    <h3><a href="#"> {{$blog->description}} </a></h3>
                                    <p> {{ date('d') - $blog->updated_at->format('d') }} days ago</p>
                                </div>
                            </div>
                        @endforeach
                    @endif


                </div>
            </div>
        </section>
        <!--================ Blog slider end =================-->


        <!--================ Start Blog Post Area =================-->
        <section class="blog-post-area section-margin mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">


                        @if (count($allBlogs) > 0)
                            @foreach ($allBlogs as $blog)
                                <div class="single-recent-blog-post">
                                    <div class="thumb">
                                        <img class="img-fluid w-75 h-25"
                                            src="{{ asset('storage') }}/blogs/{{ $blog->image }}" alt="">
                                        <ul class="thumb-info">
                                            <li><a href="#"><i class="ti-user"></i> {{ $blog->user->name }} </a>
                                            </li>
                                            <li><a href="#"><i class="ti-notepad"></i>
                                                    {{ $blog->created_at->format('d M Y') }} </a></li>
                                            <li><a href="#"><i class="ti-themify-favicon"></i> 2 Comments </a></li>
                                        </ul>
                                    </div>
                                    <div class="details mt-20">
                                        <a href="blog-single.html">
                                            <h3> {{ $blog->name }} </h3>
                                        </a>
                                        <p> {{ $blog->description }} </p>
                                        <a class="button"
                                            href="{{ route('blogs.show', parameters: ['blog' => $blog]) }}">Read More <i
                                                class="ti-arrow-right"></i></a>
                                    </div>
                                </div>
                            @endforeach
                        @endif


                        <div class="row">
                            {{-- Pagination --}}
                            <div class="col-lg-12">
                                {{ $allBlogs->render('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>

                    <!--================ Blog slider start =================-->
                    @include('theme.partials.slider')
                    <!--================ Blog slider end =================-->
                </div>
        </section>
        <!--================ End Blog Post Area =================-->


    </main>
@endsection
