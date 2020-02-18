@extends('layouts.app')
@section('main')
<div class="content">
  <div class="container-fluid">
    <section class="main">
        <div class="row">
            @foreach($last_articles as $key => $item)
              @if($loop->first)
                <div class="col-md-8">
                <a href="{{ $item->url }}" class="link_post" id="post_{{$key}}">
                  <div class="post_main post_bigger">
                    <img src="{{ $item->getMedia('images')->first() ? $item->getMedia('images')->first()->getFullUrl() : '' }}" title="{{ $item->title }}" class="post_main_img img-fluid" alt="top">
                    <div class="post_main_overlay">
                        <div class="post_main_content">
                            <h1>{{ $item->title }}</h1>
                            <p>{{ date('d.m.Y, H:i',strtotime($item->created_at)) }}</p>
                        </div>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-md-4 align-self-center">
              @else
                <a href="{{ $item->url }}" class="link_post" id="post_{{$key}}">
                  <div class="post_main {{ ($loop->last) ? 'space_top' : 'post_smaller' }}">
                    <img src="{{ $item->getMedia('images')->first() ? $item->getMedia('images')->first()->getFullUrl() : '' }}" title="{{ $item->title }}" class="post_main_img img-fluid" alt="top">
                    <div class="post_main_overlay">
                        <div class="post_main_content post_smaller">
                            <h1>{{ str_limit($item->title,30) }}</h1>
                            <p>{{ date('d.m.Y, H:i',strtotime($item->created_at)) }}</p>
                        </div>
                    </div>
                  </div>
                </a>
              @endif
            @endforeach
            </div>
          </div>
        </section>


        @foreach($categories as $category)
          @if($category->getCategoryArticles()->count())
          <section class="category_posts" data-name="{{ $category->name }}" data-category_id = "{{ $category->id }}">
              <div class="category_section-header">
                <a href="{{ $category->url }}"><h2>{{ $category->name }}</h2></a>
              </div>
              <div class="row post_list">
                <div class="col-md-10" style="border-right: 1px solid #e5e5e5">
                  <!-- <div class="d-flex flex-column"> -->
                  
                    @foreach($category->getCategoryArticles()->get() as $article)
                    
                    <a href="{{ $article->url }}" class="link_post">
                      <div class="post_category space_top">
                        <img src="{{ $article->getMedia('images')->first() ? $article->getMedia('images')->first()->getFullUrl() : '' }}" class="post_logo" title="{{ $article->title }}">
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
                    <div class="btn_more_posts">
                        <a href="{{ $category->url }}">Więcej <span><i class="fas fa-chevron-right"></i></span></a>
                    </div>
                  <!-- </div> -->
                </div>
              </div>
          </section>
          @endif
        @endforeach
    </div>
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
