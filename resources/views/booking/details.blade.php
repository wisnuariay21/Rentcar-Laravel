@extends('layouts.template')

@section('content')
<div class="ftco-blocks-cover-1">
      <div class="ftco-cover-1 overlay" style="background-image: url({{asset('front/images/hero_2.jpg')}})">
          <div class="container">
            <div class="row align-items-center justify-content-center">
              <div class="col-lg-6 text-center">
                <h1>LIBRA RENTCAR</h1>
                <p>SELAMAT DATANG</p>
              </div>
            </div>
          </div>
        </div>
      </div>

<div class="site-section bg-light" id="contact-section">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-7 text-center mb-5">
                <h2>Booking Detail</h2>
            </div>
        </div>
	<section class="content col-md-12">

		@if ($errors->any())
			@foreach ($errors->all() as $error)
				<p class="alert alert-danger">{{ $error }}</p>
			@endforeach
		@endif
		
		<div class="card card-secondary card-outline">
			<div class="card-header">
				<h3 class="card-title"> Form Booking Detail </h3>
			</div>
			<form action="{{ route('booking.proses') }}" method="post">
				{{ csrf_field() }}

				<div class="card-body">
					<table class="table">
						<thead>
							<tr>
								<th>Nama</th>
								<td>: </td>
								<td>{{ $pelanggan->nama }}</td>
								<input type="hidden" name="pelanggan_id" value="{{$pelanggan->pelanggan_id}}" required>
							</tr>
						</thead>
						<tr>
							<th>Nama Mobil</th>
							<td>: </td>
							<td>{{ $mobil->nama_mobil }}</td>
							<input type="hidden" name="mobil_id" value="{{ $mobil->mobil_id }}" required>
						</tr>
						<tr>
							<th>Kode Booking </th>
							<td>: </td>
							<td>{{ $data['kode_booking'] }}</td>
							<input type="hidden" name="kode_booking" value="{{$data['kode_booking']}}" required>
						</tr>
						<tr>
							<th>Tanggal Order</th>
							<td> : </td>
							<td>{{ $data['tgl_order'] }}</td>
							<input type="hidden" name="tgl_order" value="{{$data['tgl_order']}}" required>
						</tr>
						<tr>
							<th>Durasi Sewa</th>
							<td> : </td>
							<td>{{ $data['durasi'] }} Hari</td>
							<input type="hidden" name="durasi" value="{{ $data['durasi'] }}" required>
						</tr>
						<tr>
							<th>Tanggal Kembali</th>
							<td> : </td>
							<td>{{ $tgl_kembali }}</td>
							<input type="hidden" name="tgl_kembali_harusnya" value="{{ $tgl_kembali }}" required>
						</tr>
						<tr>
							<th>Tujuan</th>
							<td> : </td>
							<td>{{ ($tujuan) }}</td>
							<input type="hidden" name="tujuan" value="{{ $tujuan }}" required>
						</tr>
						<tr>
							<th>Biaya Supir</th>
							<td> : </td>
							<td>Rp. {{ number_format($supir) }}</td>
							<input type="hidden" name="supir" value="{{ $supir }}" required>
						</tr>
						<tr>
							<th>Biaya Sewa Mobil Per Hari</th>
							<td> : </td>
							<td>Rp. {{ number_format($mobil->harga_sewa) }}</td>
						</tr>
						<tr>
							<th>Total Biaya</th>
							<td> : </td>
							<td>Rp. {{ number_format($total_harga) }}</td>
							<input type="hidden" name="harga" value="{{ $total_harga }}" required>
						</tr>
						<tr>
							<th>Dp MInimal</th>
							<td> : </td>
							<td>Rp. {{ number_format($dp) }}</td>
						</tr>
						<tr>
							<td colspan="3"><button class="btn btn-block btn-primary text-white py-3 px-5" data-toggle="modal" data-target="#paymentModal" type="button"> Booking Sekarang </button></td>
						</tr>
						<tr>
							<td colspan="3"><a class="btn btn-block btn-danger text-white py-3 px-5" href="{{ route('booking.index') }}" type="button"> Batal </a></td>
						</tr>
					</table>
				</div>
				<!-- payment MODALS  -->
				@include('booking.form-payment')
			</form>
		</div>
		</section>
	</div>
</div>

@endsection