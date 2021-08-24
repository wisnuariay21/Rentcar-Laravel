@extends('layouts.template')

@section('content')
<div class="ftco-blocks-cover-1">
      <div class="ftco-cover-1 overlay" style="background-image: url({{asset('front/images/hero_2.jpg')}})">
          <div class="container">
            <div class="row align-items-center justify-content-center">
              <div class="col-lg-6 text-center">
                <h1>Daftar Mobil</h1>
                <p>KAMI MENYEWAKAN MOBIL DENGAN KONDISI TERBAIK</p>
              </div>
            </div>
          </div>
        </div>
      </div>

     

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">

        @foreach($mobils as $row)
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="item-1">
                <a href="#"><img src="{{ $row->getFoto() }}" alt="Image" class="img-fluid"></a>
                <div class="item-1-contents">
                  <div class="text-center">
                  <h3><a>{{ $row->nama_mobil }}</a></h3>
                  <div class="rating">
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                  </div>
                  <div class="rent-price"><span>{{ number_format($row->harga_sewa) }}</span>/ Hari</div>
                  </div>
                  <ul class="specs">
                    <li>
                      <span>Transmisi</span>
                      <span class="spec">{{$row->tipe}}</span>
                    </li>
                    <li>
                      <span>Tahun</span>
                      <span class="spec">{{$row->tahun}}</span>
                    </li>
                  </ul>
                  <div class="d-flex action">
                    <a href="{{ url('/') }}/booking" class="btn btn-primary">Sewa Sekarang</a>
                  </div>
                </div>
              </div>
          </div>
        @endforeach



        </div>
      </div>
    </div>
@endsection