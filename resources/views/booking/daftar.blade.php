@extends('layouts.template')

@section('content')
<div class="ftco-blocks-cover-1">
    <div class="ftco-cover-1 overlay" style="background-image: url({{asset('front/images/hero_2.jpg')}})">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 text-center">
              <h1>Pendaftaran</h1>
              <p>KAMI MENYEWAKAN MOBIL DENGAN KONDISI TERBAIK</p>
            </div>
          </div>
        </div>
    </div>
</div>
    
<div class="site-section bg-light" id="contact-section">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-7 text-center mb-5">
                <h2>Silahkan mengisi formulir untuk melakukan pendaftaran</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 mb-5" >
                <form action="{{ route('create-client') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group row">
                    <div class="col-md-12">
                        <label>NIK (KTP)</label>
                        <input type="text" class="form-control" required name="nik" >
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" required name="nama" >
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label>Tanggal Lahir</label>
                        <input type="text" id="datepicker" required name="tanggal_lahir" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label>No Telepon</label>
                        <input type="text" class="form-control" required name="telepon" >
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label>Alamat Lengkap</label>
                        <input type="text" class="form-control" required name="alamat" >
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label>Jenis Kelamin</label>
                        <select name="jenkel" class="form-control">
                            <option value="laki-laki" {{ (old("jenkel") == 'laki-laki' ? "selected":"") }}>Laki-Laki</option>
                            <option value="perempuan" {{ (old("jenkel") == 'perempuan' ? "selected":"") }}>Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 mr-auto">
                        <button type="submit" class="btn btn-block btn-primary text-white py-3 px-5" href="">Daftar</button>
                    </div>
                </div>
            </form>
          </div>
          <div class="col-lg-4 ml-auto">
            <div class="bg-white p-3 p-md-5">
              <h3 class="text-black mb-4">Kontak Info</h3>
              <ul class="list-unstyled footer-link">
                <li class="d-block mb-3">
                  <span class="d-block text-black">Alamat :</span>
                  <span>Jl. Sidosermo IV no. 26</span></li>
                <li class="d-block mb-3"><span class="d-block text-black">Phone:</span><span>+62 822 3220 1446</span></li>
                <li class="d-block mb-3"><span class="d-block text-black">Email:</span><span>librarentcar@gmail.com</span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection