@extends('layouts.main')
@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Мои проекты ({{$countPosts }})</h1>
            <section class="featured-posts-section">
                <div class="row">

                    @foreach ($posts as $post)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                            <div class="blog-post-thumbnail-wrapper">
                                <img style="border: 1px solid black;" src="{{ 'storage/app/public/'.$post->preview_image }}" alt="blog post">
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="blog-post-category">{{ $post->category->title }}</p>
                                @auth()
                                    <form action=" {{ route('post.like.store', $post->id) }}" method="post">
                                        @csrf
                                        <span> {{ $post->liked_users_count }}</span>
                                        <button type="submit" class="border-0 bg-transparent">


                                            @if(auth()->user()->likedPosts->contains($post->id))
                                                <i class="fas fa-heart"> </i>
                                            @else
                                                <i class="far fa-heart"> </i>
                                            @endif


                                        </button>
                                    </form>
                                @endauth
                                @guest()
                                    <div>
                                        <span> {{ $post->liked_users_count }}</span>
                                        <i class="far fa-heart"></i>
                                    </div>
                                @endguest
                            </div>


                            <a href="{{ route ('post.show', $post->slug) }}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{ $post->title }}</h6>
                                <span style="color: brown;">{{ $post->small_description }} </span>
                             </a>


                            <div class="rounded" style="background-color: #FFF3E3; border: 1px solid #FFA52F;">
                                <div class="m-2 d-flex">
                                    <span class="mr-2"> Основная технология:</span>
                                    <div class="rounded pl-1 pr-1"
                                         style="background-color: #fad6be; border: 1px solid #FFA52F;">  {{ $post->technology }}  </div>
                                    <br>
                                </div>

                                <div class="m-2 d-flex" style="flex-wrap: wrap;">
                                    <span class="mr-2"> Доп. технологии: </span>
                                    @foreach ($post->tags as $tag)

                                        <div class="rounded pl-1 pr-1 mr-1 mb-2"
                                             style="background-color: #fad6be; border: 1px solid #FFA52F;">  {{ $tag->title }} </div>
                                    @endforeach
                                    <br>
                                </div>
                                <div class="m-2 d-flex" style="flex-wrap: wrap;">
                                    <span class="mr-2"> Реализовано: </span>
                                    @if(!empty($post->additional_tech))
                                        @foreach(explode('/', $post->additional_tech) as $post_tech)
                                            <div class="rounded pl-1 pr-1 mr-1 mb-2" style="background-color: snow; border: 1px solid #FFA52F;">
                                                {{ $post_tech }}
                                            </div>
                                        @endforeach
                                    @else
                                        <div>Информация не предоставлена</div>
                                    @endif
                                </div>


                                <div class="m-2 d-flex" style="flex-wrap: wrap;">
                                    <span class="mr-2"> GitHub ссылка:  </span>
                                    @if($post->category->title === 'Коммерческие проекты')
                                        <span class="mr-2 text-danger"> нельзя </span>
                                    @else
                                        @if(isset($post->gitHub))
                                            <a href=" {{ $post->gitHub }}"> <i class="fab fa-github" style="font-size: 1.75em; color: green;"></i> </a>
                                        @else
                                            ewewe

                                        @endif
                                    @endif
                                </div>


                            </div>
                        </div>




                    @endforeach
                </div>
                <div class="row">
                    <div class="mx-auto" style="margin-top: -100px">
                        {{ $posts->links() }}
                    </div>
                </div>
            </section>
            <div class="row" style="display:none;">
                <div class="col-md-8">
                    <section>
                        <div class="row blog-post-row">
                            @foreach($randomPosts as $post)
                                <div class="col-md-6 blog-post" data-aos="fade-up">
                                    <div class="blog-post-thumbnail-wrapper">
                                        <img src="{{ 'storage/app/public/'.$post->preview_image }}" alt="blog post">
                                    </div>
                                    <p class="blog-post-category">{{ $post->category->title }}</p>
                                    <a href="{{ route ('post.show', $post->id) }}" class="blog-post-permalink">
                                        <h6 class="blog-post-title">{{ $post->title }}</h6>
                                    </a>
                                </div>
                            @endforeach


                        </div>
                    </section>
                </div>
                <div class="col-md-4 sidebar" data-aos="fade-left"  style="display:none;>

                    <div class="widget widget-post-list">
                        <h5 class="widget-title">Самые залайканные сайты</h5>
                        <ul class="post-list">
                            @foreach ($likedPosts as $post)
                                <li class="post">
                                    <a href="{{ route ('post.show', $post->id) }}" class="post-permalink media">
                                        <img src="{{ 'storage/app/public/'.$post->preview_image }}" alt="blog post">
                                        <div class="media-body">
                                            <h6 class="post-title">{{ $post->title }}</h6>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>

    </main>
@endsection
