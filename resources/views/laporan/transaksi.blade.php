@extends('layouts.app')

@section('content')

<section class="content">
	<div class="card card-secondary card-outline">
		<div class="card-header">
			Transaksi sewa periode {{ $data['start_date'] }} sampai {{ $data['end_date'] }} dan status ' {{ $data['tipe'] }} '
		</div>
		<div class="card-body">
			<table class="table table-sm" id="myTable">
				<thead>
					<tr>
                        <th>Kode Booking</th>
						<th>Tgl Sewa</th>
						<th>Nama Pelanggan</th>
						<th>Nama Mobil</th>
						<th>Durasi Sewa</th>
						<th>Tgl Kembali Harusnya</th>
						<th>Tgl Kembali</th>
						<th>Total Harga</th>
						<th>Status Sewa</th>
						<th>Denda Sewa</th>
					</tr>
				</thead>
				<tbody>
					@foreach($bookings as $row)
					<tr>
						<td>{{ $row['kode_booking'] }}</td>
						<td>{{ $row['tgl_order'] }}</td>
						<td>{{ $row['nama'] }}</td>
						<td>{{ $row['nama_mobil'] }}</td>
						<td>{{ $row['durasi'] }} Hari</td>
						<td>{{ $row['tgl_kembali_harusnya'] }}</td>
						<td>{{ $row['tgl_kembali'] }}</td>
						<td>{{ $row['harga'] }}</td>
						<td>{{ $row['status'] }}</td>
						<td>{{ $row['denda'] }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</section>

@endsection