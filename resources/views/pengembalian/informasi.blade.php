@extends('layouts.app')

@section('content')

<div class="content col-md-12">
	@if ($errors->any())
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
    @endif
	<div class="card card-secondary card-outline">
        <div class="card-header">
        	<h3 class="card-title">Informasi Sewa</h3>
        </div>
       <form action="{{ route('pengembalian.proses') }}" method="post">
            {{ csrf_field() }}
            <div class="card-body">
            	<table class="table">
            		<thead>
            			<tr>
            				<td><b>Nama Pelanggan</b> </td>
            				<td>: </td>
            				<td>{{ $pelanggans->nama }}</td>
                            <input type="hidden" name="pelanggan_id" value="{{$pelanggans->pelanggan_id}}" required>
            			</tr>
        			</thead>
                    <tr>
                        <th>Nama Mobil</th>
                        <td>: </td>
                        <td>{{ $mobils->nama_mobil }}</td>
                        <input type="hidden" name="mobil_id" value="{{ $mobils->mobil_id }}" required>
                    </tr>
        			<tr>
        				<th>Kode Booking</th>
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
        				<th>Tanggal Kembali Harusnya</th>
        				<td> : </td>
        				<td>{{ $data['tgl_kembali_harusnya'] }}</td>
                        <input type="hidden" name="tgl_kembali_harusnya" value="{{ $data['tgl_kembali_harusnya'] }}" required>
        			</tr>
        			<tr>
        				<th>Biaya Sewa Mobil / Hari</th>
        				<td> : </td>
        				<td>Rp. {{ number_format($mobils->harga_sewa) }}</td>
        			</tr>
					<tr>
        				<th>Biaya Supir</th>
        				<td> : </td>
        				<td>Rp. {{ number_format($supir) }}</td>
        			</tr>
        			<tr>
        				<th>Total Biaya Sewa</th>
        				<td> : </td>
        				<td>Rp. {{ number_format($total_sewa) }}</td>
                        <input type="hidden" name="harga" value="{{ $total_sewa }}" required>
        			</tr>
        			<tr>
        				<th>Denda Keterlambatan</th>
        				<td> : </td>
        				@if($denda != null)
        				<td style="color:red">Rp. {{ number_format($denda) }}</td>
        				@else 
        				<td>Rp. 0</td>
        				@endif
        			</tr>
					<tr>
        				<th>Denda Kerusakan</th>
        				<td> : </td>
						@if($denda_rusak != null)
        				<td style="color:red">Rp. {{ number_format($denda_rusak) }}</td>
						@else
						<td>Rp. 0</td>
        				@endif
        			</tr>
        			<tr>
        				<th>DP</th>
        				<td> : </td>
        				<td>Rp. {{ number_format($pembayarans->jumlah) }}</td>
        			</tr>
        			<tr>
        				<th colspan="2">TOTAL</th>
        				<input type="hidden" name="total" id="total" value="{{ $total }}" >
        				<td><b> Rp. {{ number_format($total) }} </b></td>
        			</tr>
                    <tr>
                        <td colspan="3"><button href="#" data-toggle="modal" data-target="#paymentModal" type="button"> Proses </button></td>
                    </tr>
            	</table>
            </div>
            <!-- payment MODALS  -->
            @include('pengembalian.form-payment')
        </form>
    </div>	
</div>

@endsection

@push('scripts')
<script>
	$(document).ready(function(e){
        $('#jumlah').keyup(function(){
            var jumlah = $(this).val();
            var total = $('#total').val();
            if(jumlah != ''){
                $.ajax({
                    success:function(data){
                        $('#change').html(jumlah - total);
                    }
                });
            }
        });
    });
</script>

<script>
	$(document).ready(function(e){
        $('#dendarusak').keyup(function(){
            var jumlah = $(this).val();
            var total = $('#total').val();
            if(jumlah != ''){
                $.ajax({
                    success:function(data){
                        $('#ganti').html(parseInt(jumlah) + parseInt(total));
                    }
                });
            }
        });
    });
</script>
@endpush