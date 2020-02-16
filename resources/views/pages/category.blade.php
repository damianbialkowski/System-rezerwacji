@extends('layouts.app',['settings' => $settings])
@section('main')
<div class="content">
    <section class="container-fluid">
        <h2>{{ $category->name }}</h2>
        <p>Znaleziono: <b>{{ $category->getCategoryArticles()->count() }}</b> wyników</p>
        {{-- {{dd($category->getCategoryArticles($category->id)->get())}} --}}
        @php
            $items = $category->getCategoryArticles()->paginate(5);
        @endphp
        @if($items)
            @foreach($items as $article)      
                <a href="{{ $article->getUrl() }}" class="link_post">
                <div class="post_category space_top">
                    <img src="{{ $article->getMedia('images')->first() ? $article->getMedia('images')->first()->getFullUrl() : '' }}" title="{{ $article->title }}" class="post_logo" alt="top">
                    <div class="post_content">
                    <h2>{{ str_limit($article->title,50) }}</h2>
                    <p>{!! str_limit($article->content,150) !!}</p>
                    <span>{{ date('d.m.Y, H:i',strtotime($article->created_at)) }}</span>
                    </div>
                    <span class="post_more_info">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                </div>
                </a>
            @endforeach
            {{ $items->links() }}
        @endif
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