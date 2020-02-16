@extends('layouts.app')
@section('main')
<div class="content">
<section class="container-fluid main post_single ptop spaceSection">
      <div class="row">
        <div class="col-md-9">
            <div class="post_main post_bigger">
              <img src="{{ $article->getMedia('images')->first() ? $article->getMedia('images')->first()->getFullUrl() : '' }}" title="{{ $article->title }}" class="post_main_img" alt="top">
              <div class="post_main_overlay">
                  <div class="post_main_content">
                      <h1>{{ $article->title }}</h1>
                      <div class="d-flex align-items-center">
                        <p>{{ date('d.m.y, H:i',strtotime($article->created_at)) }}</p> 
                      </div>
                      <div class="d-flex align-items-center">
                        <span class="label-info-bg">{{ $article->category->name }}</span>
                      </div>
                  </div>
              </div>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-9">
      <div class="post_content">
        {!! $article->content !!}

        @if($article->author() && $article->author()->username != null)
          <hr>
          <div class="d-flex justify-content-between">
            <p>Artykuł opublikowany przez: <b>{{ $article->author()->username }}</b>
          </div>
        @endif
      </div>
      @php
        $random_articles = App\Article::inRandomOrder()->where('category_id',$article->category_id)->where('id','!=',$article->id)->take(3)->get();
      @endphp

      @if($random_articles->count())
        <div class="related_posts">
          <div class="category_section-header">
              <h2>Podobne wyszukiwania</h2>
          </div>
          <div class="row">
              @foreach($random_articles as $random_article)
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <a href="{{ $random_article->url }}" class="link_post post_1">
                    <div class="post_main post_smaller">
                      <img src="{{ $random_article->getMedia('images')->first() ? $random_article->getMedia('images')->first()->getFullUrl() : '' }}" title="{{ $random_article->title }}" class="post_main_img" alt="top">
                      <div class="post_main_overlay">
                          <div class="post_main_content">
                              <h1>{{ $random_article->title }}</h1>
                              <p>{{ date('d.m.y, H:i',strtotime($random_article->created_at)) }}</p>
                          </div>
                      </div>
                    </div>
                  </a>
                </div>
            @endforeach
            
          </div>
        </div>
      @endif
        </div>
      </div>
      {{-- <div class="comments_post space-top" style="min-height: 500px;">
          <div class="category_section-header">
              <h2>Komentarze</h2>
          </div>
      </div> --}}
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