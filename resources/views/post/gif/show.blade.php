@extends('layouts.main')
@section('content')

    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up" style="padding: 0px;"> {{ $post->title }}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up"
               data-aos-delay="200" style="margin-bottom:5px;"> {{ $date->translatedFOrmat('F') }}  {{ $date->day }} {{ $date->year }}
                •  {{ $post->comments->count() }} комментариев</p>

            <section class="post-content">
                @vite(['resources/css/app.css', 'resources/js/app.js'])



                <br>
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        {!! $post->content !!}
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">

                </div>
            </div>
        </div>
    </main>



@endsection

