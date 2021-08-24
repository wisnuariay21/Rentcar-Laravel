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
            <form action="" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>NIK</p>
                            <input type="number" class="form-control" required name="nik" value="{{ old('nik') }}">
                        </div>
                        <div class="form-group">
                            <p>Nama</p>
                            <input type="text" class="form-control" required name="nama" value="{{ old('nama') }}" >
                        </div>
                        <div class="form-group">
                            <p>Tanggal Lahir</p>
                            <input type="text" class="form-control" required name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" id="datepicker">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>Telepon</p>
                            <input type="number" class="form-control" required name="telepon" value="{{ old('telepon') }}">
                        </div>
                        <div class="form-group">
                            <p>Jenis Kelamin</p>
                            <select name="jenkel" class="form-control">
                                <option value="laki-laki" {{ (old("jenkel") == 'laki-laki' ? "selected":"") }}>Laki-Laki</option>
                                <option value="perempuan" {{ (old("jenkel") == 'perempuan' ? "selected":"") }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <p>Alamat</p>
                            <input type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" >
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