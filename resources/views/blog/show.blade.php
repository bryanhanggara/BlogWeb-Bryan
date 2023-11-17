@extends('layouts.app')

@section('content')
<div class="blog-detail">
    <img src="{{asset('assets/gallery/' . $blog->image_blog)}}" alt="Header Image" class="header-image">
    <div class="blog-title">{{$blog->judul}}</div>
    <div class="blog-meta">
      <span><i class="far fa-calendar-alt"></i> Published on {{$blog->created_at->format('F d, y')}}</span> | 
      <span class="ml-3"><i class="far fa-user"></i> Author: {{$blog->blogWriter->name}}</span>
    </div>
    <div class="blog-content">
       {{$blog->isi_blog}}
    </div>
  </div>
@endsection