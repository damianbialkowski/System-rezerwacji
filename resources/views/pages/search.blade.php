@extends('layouts.app',['settings' => $settings])
@section('main')
<div class="content">
    <section class="container-fluid searchPage ptop">
        <h2>Szukana fraza: <b>{{ (isset($phrase) ? $phrase : 'brak') }}</b></h2>
        <p>Znaleziono: <b>{{ $articles->count() }}</b> wyników</p>
        <div class="search-articles">
            @if($articles->count())
                @foreach($articles as $article)
                <a href="{{ url('article/'.$article->id.','.$article->slug) }}" class="link_post">
                    <div class="post_category space_top">
                    <img src="{{ $article->getMedia('images')->first() ? $article->getMedia('images')->first()->getFullUrl() : '' }}" class="post_logo" title="{{ $article->title }}">
                    <div class="post_content">
                        <h2>{{ str_limit($article->title,50) }}</h2>
                        <p>{!! str_limit($article->content,150) !!}</p>
                        <span>{{ date('d.m.y, H:i',strtotime($article->created_at)) }}</span>
                    </div>
                    <span class="post_more_info">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                    </div>
                </a> 
                @endforeach
            @else
            <p>Brak wyników</p>
            @endif
        </div>
    </section>
</div>
    <a href="#" class="back_top">
      <i class="fa fa-long-arrow-alt-up"></i>
    </a>
@endsection
@section('script')
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
@endsection