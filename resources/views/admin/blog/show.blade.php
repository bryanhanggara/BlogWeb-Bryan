@extends('layouts.admin')

@section('content')
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="pagetitle">
      <h1>Detail Blog</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
          <li class="breadcrumb-item active">Blog</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                    <nav>
                        <ol class="breadcrumb mt-4">
                          <li class="breadcrumb-item">Author : </li>
                          <li class="breadcrumb-item active">{{$blog->blogWriter->name}}</li>
                        </ol>
                      </nav>
                      <h3>
                        {{$blog->judul}}
                      </h3>
                      <p class="mt-5">
                        {{$blog->isi_blog}}
                      </p>
                      <p>Header Image</p>
                      <img src="{{asset('assets/gallery/' . $blog->head_image)}}" style="height: 300px">
                      <p>Header Image</p>
                      <img src="{{asset('assets/gallery/' . $blog->image_blog)}}" style="height: 300px">
                </div>
              </div>

            </div><!-- End Customers Card -->

          </div>
        </div><!-- End Left side columns -->
   
      </div>
    </section>
@endsection