@extends('layouts.admin')

@section('content')
    
    <div class="pagetitle">
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
     @endif
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">


                <div class="card-body">
                  <h5 class="card-title">Tambah <span>| Blog</span></h5>
                    
                    <form action="{{route('blog.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <input type="text" name="category" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="judul">Author : </label>
                            <select class="form-control" name="user_id">
                                <option value="">Siapa Authornya</option>
                               @foreach ($user as $item)
                                  @if ($item->roles == "ADMIN")
                                      <option value="{{$item->id}}">
                                        {{$item->name}}
                                      </option>
                                  @endif
                               @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="judul">Judul Blog : </label>
                            <input type="text" name="judul" id="judul" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="isi_blog">Isi Blog : </label>
                            <textarea name="isi_blog" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="isi_blog">Gambar Blog : </label>
                         <input type="file" name="image_blog" class="form-control">
                      </div>
                        <div class="form-group">
                          <label for="head_image">Header Image : </label>
                         <input type="file" name="head_image" class="form-control">
                      </div>
                      <button class="btn btn-success mt-4" type="submit">
                          Upload
                      </button>
                    </form>
    
                </div>
              </div>

            </div><!-- End Customers Card -->

          </div>
        </div><!-- End Left side columns -->
   
      </div>
    </section>
@endsection