
@extends('layouts.template')

@section('content')

<div class="ftco-blocks-cover-1">
    <div class="ftco-cover-1 overlay" style="background-image: url({{asset('front/images/libra.jpg')}})">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 text-center">
              <h1>Booking</h1>
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
                <h2>Silahkan mengisi formulir untuk melakukan booking mobil</h2>
            </div>
        </div>
@include('booking.form-client')
        <div class="row">
            <div class="col-lg-8 mb-5" >
                <form action="{{ route('booking.hitung' )}}" method="post">
                {{ csrf_field() }}

                <div class="form-group row">
                    <div class="col-md-12">
                        <p>Kode Booking</p>
                        <input type="text" class="form-control" required name="kode_booking" value=" B-{{ rand() }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <p>Nama Lengkap Pendaftaran</p>
                        <input type="text" class="form-control" required id="pelanggan" value="{{ old('pelanggan_id') }}" placeholder="type something">
                        <input type="hidden" name="pelanggan_id" id="pelanggan_id" value="{{ old('pelanggan_id') }}">
                        <div id="pelanggan-list"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <p>Tanggal Order</p>
                        <input type="text" class="form-control" required name="tgl_order" value="{{ old('tgl_order') }}" id="datepickers" >
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <p>Durasi Sewa / Hari</p>
                        <input type="number" class="form-control" required name="durasi" value="1" min="1">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 mb-4 mb-lg-0">
                    <p>Dalam / Luar Kota</p>
                        <select name="tujuan" class="form-control" required>
                            <option value=""> - Select One - </option>
                            <option value="dalam_kota">Dalam Kota</option>
                            <option value="luar_kota">Luar Kota</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <p>Dengan / Tanpa Pengemudi</p>
                        <select name="supir" class="form-control" required>
                            <option value=""> - Select One - </option>
                            <option value="dengan_supir">Dengan Pengemudi</option>
                            <option value="tanpa_supir">Tanpa Pengemudi</option>
                        </select>
                    </div>
                    </div>
                <div class="form-group row">
                    <div class="col-md-12">
                    <p>Pilih Mobil</p>
                    <select name="mobil_id" class="form-control" required>
                        <option value=""> - Select One - </option>
                        @foreach($mobils as $car)
                        <option value="{{ $car->mobil_id }}" {{($car->mobil_id == old('mobil_id') ? 'selected' : '')}} >{{ $car->nama_mobil }} - Rp. {{ number_format($car->harga_sewa)." a day" }}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 mr-auto">
                        <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Proses">
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

@push('scripts-user')
<script>
    $(document).ready(function(e){
        $('#pelanggan').keyup(function(){
            var pelanggan = $(this).val();
            if(pelanggan != ''){
                $.ajax({
                    url:"list-member",
                    method:"GET",
                    data:{data:pelanggan},
                    success:function(data){
                        $('#pelanggan-list').fadeIn();
                        $('#pelanggan-list').html(data);
                    }
                });
            }
        });
    });
    $(document).on('click', '.li-pelanggan', function(){
        $('#pelanggan').val($(this).text());
        var pelanggan_id = $('input[id="pelanggan"]').val();
        newPelanggan = pelanggan_id.split(" ");
        $('#pelanggan_id').val(newPelanggan[0]);
        $('#pelanggan-list').fadeOut();
    });
    $(document).on('click', '.li-pelanggan-null', function(){
        $('#pelanggan').val("");
       
        $('#pelanggan_id').val(newPelanggan[0]);
        $('#pelanggan-list').fadeOut();
    });

    $("body").mouseup(function(e){
        if($(e.target).closest('#pelanggan').length==0){
            $('#pelanggan-list').stop().fadeOut();
        }
    });
</script>
@endpush