@extends('layouts.app')

@section('content')

<section class="content col-md-6">

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
            <form action="{{ route('pengembalian.biaya_tambahan', ['booking_id' => $bookings->booking_id]) }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>Kode Booking</p>
                            <input type="text" class="form-control" required name="kode_booking" value="{{ $bookings->kode_booking }}" readonly>
                        </div>
                        <div class="form-group">
                            <p>Tanggal Booking</p>
                            <input type="datetime" class="form-control" required name="tgl_order" value="{{ $bookings->tgl_order }}" readonly>
                        </div>
                        <div class="form-group">
                            <p>Biaya Denda Keterlambatan</p>
                            <input type="number" class="form-control" name="denda" value="{{ $bookings->denda }}" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>Durasi Sewa / Hari</p>
                            <input type="number" class="form-control" required name="durasi" value="{{ $bookings->durasi }}" >
                        </div>
                        <div class="form-group">
                            <p>Tanggal Kembali</p>
                            <input type="datetime" class="form-control" required name="tgl_kembali_harusnya" value="{{ $bookings->tgl_kembali_harusnya }}" readonly>
                        </div>
                        <div class="form-group">
                            <p>Biaya Denda Kerusakan</p>
                            <input type="number" class="form-control" name="denda_kerusakan" value="{{ $bookings->denda_kerusakan }}" >
                        </div>
                    </div>
                </div>
                <input type="submit">
                <a href="{{ route('pengembalian.index') }}">Kembali</a>
            </form>
        </div>
    </div>
</section> 

@endsection