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
            <form action="{{ route('mobil.update', ['mobil_id' => $mobils->mobil_id]) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>Nama</p>
                            <input type="text" class="form-control" required name="nama_mobil" value="{{ $mobils->nama_mobil }}" >
                        </div>
                        <div class="form-group">
                            <p>Tahun</p>
                            <input type="number" class="form-control" required name="tahun" value="{{ $mobils->tahun }}">
                        </div>
                        <div class="form-group">
                            <p>Nomor Polisi</p>
                            <input type="text" class="form-control" required name="nopol" value="{{ $mobils->nopol }}">
                        </div>
                        <div class="form-group">
                            <p>Foto</p>
                            <input type="file" class="form-control" name="foto" value="{{ $mobils->foto }}">
                        </div>
                    </div>
            
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>Harga</p>
                            <input type="number" class="form-control" required name="harga_sewa" value="{{ $mobils->harga_sewa }}">
                        </div>
                        <div class="form-group">
                            <p>Tipe</p>
                            <select name="tipe" class="form-control">
                                <option>- Select one -</option>
                                <option value="manual" {{ ($mobils->tipe == 'manual' ? "selected":"") }}>Manual</option>
                                <option value="matic" {{ ($mobils->tipe == 'matic' ? "selected":"") }}>Matic</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <p>Merek</p>
                            <select name="merek_id" class="form-control">
                                <option value="">- Select one -</option>
                                @foreach($mereks as $m)
                                    <option value="{{$m->merek_id}}" {{($mobils->merek_id == $m->merek_id ? 'selected' : '')}} >{{$m->nama}}</option>
                                 @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <input type="submit" value="Update">
                <a href="{{ route('mobil.index') }}">Kembali</a>
            </form>
        </div>
    </div>
</section> 

@endsection