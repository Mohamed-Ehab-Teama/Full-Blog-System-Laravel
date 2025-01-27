@extends('theme.master')

@section('title', 'ADD Blog')

@section('content')
@include('theme.partials.hero', ['title' => 'ADD New Blog'])


<!-- ================ contact section start ================= -->
<section class="section-margin--small section-margin">
    <div class="container">
        <div class="row">
            <div class="col-12">

                @if (session('BlogDeleteStatus'))
                <div class="alert alert-success">
                    {{ session('BlogDeleteStatus') }}
                </div>
                @endif

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($myBlogs) > 0)
                        @foreach ($myBlogs as $blog)
                        <tr>
                            <td>
                                <a href="{{ route('blogs.show', ['blog' => $blog]) }}"> {{ $blog->name }} </a>
                            </td>
                            <td>
                                <a href="{{ route('blogs.edit', ['blog' => $blog]) }}" class="btn btn-primary mx-2 "> Edit </a>
                                <form class="d-inline" method="post" action="{{route('blogs.destroy', ['blog' => $blog] )}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mx-2 "> Delete </button>
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