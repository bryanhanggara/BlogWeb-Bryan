@extends('layouts.app')

@section('content')
    <!-- Add this where you display alerts in your Blade template -->
    @if(session('success'))
    <div id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('error'))
    <div id="errorAlert" class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="about-section">
        <div class="about-title">About</div>
        <div class="description">
        <div class="row">
            <div class="col-md-6"><p>Halo! Perkenalkan, aku Ridho, seorang mahasiswa Teknik Elektro di Universitas Sriwijaya yang tengah menjalani perjalanan pendidikan pada tahun 2023. Saya penuh semangat dalam mengejar impian menjadi ahli di bidang teknologi dan rekayasa listrik.

                Sejak awal masuk ke dunia perkuliahan, ketertarikan saya pada teknik elektro terus tumbuh. Saya selalu kagum dengan kompleksitas dan inovasi yang terus berkembang dalam bidang ini. Setiap kelas dan proyek menjadi tantangan yang memotivasi saya untuk terus belajar dan mencari pemahaman yang lebih mendalam.</p></div>
            <div class="col-md-6">
                <img src="{{url('blog_fe/image/img4.png')}}" alt="Foto Saya" style=" height: 350px; border-radius: 20px;">
            </div>
        </div>
        </div>
    </div>
    <div class="parallax-container">
        <div class="parallax-content">
        <h1>Halo Semuanya</h1>
        <p>Ini Blog Ridho Firman Saputra</p>
        </div>
    </div>

    <div class="card-container">
        @foreach ($blogs as $item)
       <a href="{{route('view.blog', $item->id)}}" style="text-decoration: none;">
        <div class="card">
            <div class="card-label">{{$item->category}}</div>
                <img src="{{asset('assets/gallery/' . $item->head_image)}}" alt="Card 1">
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

    <div class="contact-section">
        <div class="container">
            <div class="contact-title">Thanks For Visiting My Blog <br> Let's stay connected and be friends</div>
        <div class="contact-info">
          <p>
            Tekan tombol dibawah untuk kita terhubung
          </p>
          <p>
            <a href="" class="btn btn-success" style="width: 200px; border-radius: 20px">
                Whatapps
            </a>
          </p>
        </div>
        </div>    
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        window.addEventListener('scroll', function() {
        const parallaxContainer = document.querySelector('.parallax-container');
        const scrollValue = window.scrollY;
        parallaxContainer.style.backgroundPositionY = `${scrollValue * 0.5}px`;
        });

          // Auto-hide alert after 5 seconds (5000 milliseconds)
          setTimeout(function() {
            var successAlert = document.getElementById('successAlert');
            var errorAlert = document.getElementById('errorAlert');
        
            var successAlertBS = new bootstrap.Alert(successAlert);
            var errorAlertBS = new bootstrap.Alert(errorAlert);
        
            successAlertBS.close();
            errorAlertBS.close();
        }, 5000);
    </script>
    
@endsection