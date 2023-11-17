@extends('layouts.admin')

@section('content')
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="pagetitle">
      <h1>Daftar Blog</h1>
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
                    <table class="table table-striped mt-4">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Tanggal Dibuat</th>
                                <th>Author</th>
                                <th>Menu</th>
                                <th>Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($blogs as $item)
                               <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->judul}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->blogWriter->name}}</td>
                                    <td>
                                      <button class="btn btn-secondary">
                                        <a href="{{route('blog.edit', $item->id)}}" class="text-white">
                                          <i class="bi bi-pen"></i>
                                        </a>
                                      </button>
                                      <button class="btn btn-warning">
                                        <a href="{{route('blog.show', $item->id)}}" class="text-white">
                                          <i class="bi bi-eye"></i>
                                        </a>
                                      </button>
                                    </td>
                                    <td>
                                      <form action="{{route('blog.destroy' , $item->id)}}" method="post">
                                        @csrf
                                        @method('delete')

                                        <button class="btn btn-danger" type="submit">
                                          <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                    </td>
                               </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
              </div>

            </div><!-- End Customers Card -->

          </div>
        </div><!-- End Left side columns -->
   
      </div>
    </section>
@endsection