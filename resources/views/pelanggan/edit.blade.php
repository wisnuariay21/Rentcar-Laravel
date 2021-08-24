@extends('layouts.app')

@section('content')

<section class="content col-md-12">

    @if ($errors->any())
        
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
           
    @endif

    <div class="card card-secondary card-outline">
        <div class="card-header">
            <h3 class="card-title">Form {{$title}} </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('pelanggan.update', ['pelanggan_id' => $pelanggans->pelanggan_id]) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>NIK</p>
                            <input type="number" class="form-control" required name="nik" value="{{ $pelanggans->nik }}">
                        </div>
                        <div class="form-group">
                            <p>Nama</p>
                            <input type="text" class="form-control" required name="nama" value="{{ $pelanggans->nama }}" >
                        </div>
                        <div class="form-group">
                            <p>Tanggal Lahir</p>
                            <input type="text" class="form-control" required name="tanggal_lahir" value="{{ $pelanggans->tanggal_lahir }}" id="datepicker">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>Telepon</p>
                            <input type="number" class="form-control" required name="telepon" value="{{ $pelanggans->telepon }}">
                        </div>
                        <div class="form-group">
                            <p>Jenis Kelamin</p>
                            <select name="jenkel" class="form-control">
                                <option value="laki-laki" {{ ($pelanggans->jenkel == 'laki-laki' ? "selected":"") }}>Laki-Laki</option>
                                <option value="perempuan" {{ ($pelanggans->jenkel == 'perempuan' ? "selected":"") }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <p>Alamat</p>
                            <input type="text" class="form-control" name="alamat" value="{{ $pelanggans->alamat }}" >
                        </div>
                    </div>
                </div>
                <input type="submit">
                <a href="{{ route('pelanggan.index') }}">Kembali</a>
            </form>
        </div>
    </div>
</section> 

@endsection