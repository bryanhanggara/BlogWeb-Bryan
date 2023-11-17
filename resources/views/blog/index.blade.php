@extends('layouts.app')

@section('content')
<div class="blog-header">
    <div class="blog-title">Welcome to My Blog</div>
    <div class="blog-search">
        <form action="{{route('blog')}}" method="get">
            <input type="text" class="search-input" placeholder="Search..." name="query" value="{{ $searchQuery ?? '' }}">
            <button class="search-button" type="submit">Search</button>
        </form>
    </div>
    <div class="blog-categories">
        <form action="{{route('blog')}}" method="get">
            @foreach ($categories as $item)
                <button class="category-button" name="query" value="{{$item}}">{{$item}}</button>
            @endforeach
        </form>
    </div>
  </div>

  <div class="card-container">
    @foreach ($blogs as $item)
    <a href="{{route('view.blog', $item->id)}}" style="text-decoration: none;">
        <div class="card">
            <div class="card-label">{{$item->category}}</div>
                <img src="{{asset('assets/gallery/' . $item->image_blog)}}" alt="Card 1">
                <div class="card-content">
                <h3>{{ \Illuminate\Support\Str::limit($item->judul, $limit = 15, $end = '...')}}</h3>
                <p>
                    {{\Illuminate\Support\Str::limit($item->isi_blog, $limit = 70, $end = '...')}}
                </p>
            </div>
        </div>
    </a>
    @endforeach
    </div>
    <div class="container mb-4">
        <div class="pagination text-center justify-content-center">
            @if ($blogs->previousPageUrl())
                <a href="{{ $blogs->previousPageUrl() }}" rel="prev" class="page-link">&laquo; Previous</a>
            @endif
    
            @for ($i = 1; $i <= $blogs->lastPage(); $i++)
                <a href="{{ $blogs->url($i) }}" class="page-link">{{ $i }}</a>
            @endfor
    
            @if ($blogs->nextPageUrl())
                <a href="{{ $blogs->nextPageUrl() }}" rel="next" class="page-link">Next &raquo;</a>
            @endif
        </div>
    </div>
    
     
@endsection