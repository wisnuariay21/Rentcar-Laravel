@extends('layouts.app')

@section('content')

<section class="content">
    <div class="card card-secondary card-outline">
       
        <div class="card-body">
            <table class="table table-sm" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Booking</th>
                        <th>Tanggal Order</th>
                        <th>Tanggal Kembali Seharusnya</th>
                        <th>Nama Pelanggan</th>
                        <th>Mobil</th>
                        <th>Nopol</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data_booking as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->kode_booking }}</td>
                        <td>{{ $row->tgl_order }}</td>
                        <td>{{ $row->tgl_kembali_harusnya }}</td>
                        <td>{{ $row->nama }}</td>
                       	<td>{{ $row->nama_mobil }}</td>
                       	<td>{{ $row->nopol }}</td>
                       	<td><a href="{{ route('pengembalian.informasi', ['kode_booking' => $row->kode_booking ]) }}" class="btn btn-primary btn-sm">Proses Kembali</a>
                        <a href="{{ route('pengembalian.biaya',  ['booking_id' => $row["booking_id"]]) }}" class="btn btn-warning btn-sm">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section> 

@endsection