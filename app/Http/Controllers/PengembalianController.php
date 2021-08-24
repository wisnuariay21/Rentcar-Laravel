<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Pengembalian;
use App\Booking;
use App\Pelanggan;
use App\Mobil;
use DateTime;
use Alert;

class PengembalianController extends Controller
{
    public function index(){
        
        $data['menu'] = 5;
    	$data['title'] = 'Data Booking';
    	$data['data_booking'] = Booking::join('pelanggans', 'pelanggans.pelanggan_id', '=', 'bookings.pelanggan_id')->join('mobils', 'mobils.mobil_id', '=', 'bookings.mobil_id')->where('bookings.status', 'proses')->get();
		$data['no'] = 1;
	
    	return view('pengembalian.index', $data);
	}
	
	public function edit($id)
    {
		$data['title'] = "Edit Booking";
		$data['menu'] = 5;
        $data['bookings'] = Booking::find($id);
        
        return view('pengembalian.biaya', $data);
	}
	
	public function biaya_tambahan(Request $request, $id){

		$bookings = Booking::find($id);
		if($bookings->kode_booking == $request->kode_booking){
			$this->validate($request,[
				//'denda' => 'required',
				//'denda_kerusakan' => 'required',
			]);
		}else{
			$this->validate($request,[
				'kode_booking' => 'required',
				//'denda' => 'required',
				//'denda_kerusakan' => 'required',
			]);
		}

		if($this){
			$insert = Booking::find($id)->update($request->toArray());
			Alert::toast('Sukses edit booking !', 'success');
        	return redirect()->route('pengembalian.index');
		}else{
			Alert::toast('Gagal edit booking !', 'warning');
        	return redirect()->route('pengembalian.index');
		}
		//$bookings->update($request)
		//$kode_booking = $request->kode_booking;
		//$booking_table = Booking::where('kode_booking', $kode_booking)->first();	
	}

    public function informasi(Request $request){
    	$kode_booking = $request->kode_booking;
    	//jika parameter kosong
    	if($kode_booking == ''){
			
			Alert::toast('Pilih Data Dari Tabel Dibawah!', 'warning');
        	return redirect()->route('pengembalian.index');
    	} 

    	$booking_table = Booking::where('kode_booking', $kode_booking)->first();
    	//jika booking code tidak ditemukan
    	if($booking_table->count() == 0){
			
			Alert::toast('Data Tidak Tiidak Ditemukan!', 'warning');
        	return redirect()->route('pengembalian.index');
    	} 

    	//denda keterlambatan (perhitungannya nambah 10% per harinya)
    	/*if($booking_table->tgl_kembali_harusnya <  date('Y-m-d')){	
    		$kembali_asli = new DateTime($booking_table->tgl_kembali_harusnya);
    		$kembali_sekarang = new DateTime(date('Y-m-d'));
    		$selisih = $kembali_asli->diff($kembali_sekarang);
    		for($i=1; $i<=$selisih->days; $i++){
    			$denda = ($booking_table->harga * $i.'0')/100;
    		}
    		$data['denda'] = $denda;
    		$data['telat'] = $selisih->days;
    	} else {
    		$data['denda'] = null;
    		$data['telat'] = null;
    	}*/

		$data['denda'] = $booking_table->denda;
		$data['denda_rusak'] = $booking_table->denda_kerusakan;
		$data['supir'] = $booking_table->supir;
		$data['durasi'] = $booking_table->durasi;
    	
    	$data['pembayarans'] = Pengembalian::where('kode_booking',$kode_booking)->get()->first();
    	$data['data'] = $booking_table;
    	$data['pelanggans'] = Pelanggan::find($booking_table->pelanggan_id);
		$data['mobils'] = Mobil::find($booking_table->mobil_id);
		$data['total_sewa'] = $data['mobils']->harga_sewa * $data['durasi'] + $data['supir'];
    	$data['total'] = $data['total_sewa']  + $data['denda'] + $data['denda_rusak'] - $data['pembayarans']->jumlah;
    	$data['title'] = 'Proses Pengembalian';
    	$data['menu'] = 5;

    	return view('pengembalian.informasi', $data);
    }

    public function proses(Request $request){
    	$this->validate($request,[
    		'jumlah' => 'required|min:'.$request->total .'|numeric',
    		'kode_booking' => 'required',
    	]);
    	//kalau jumlah lebih besar dari total, otomatis data total yg jadi value jumlah
    	//biar ga kelamaan ngitung
    	if($request->jumlah > $request->total){
    		$request->jumlah = $request->total;
    	}

    	//dd($request->toArray());

    	//update table booking
    	$update_booking = Booking::where('kode_booking', $request->kode_booking)->update([
			'tgl_kembali' => date('Y-m-d'),
			'harga' => $request->harga,
    		'status' => 'lunas',
    	]);

    	//add to table pembayaran
    	Pengembalian::create([
    		'tipe' => $request->tipe,
    		'jumlah' => $request->jumlah,
    		'tanggal' => date('Y-m-d'),
    		'pelanggan_id' => $request->pelanggan_id,
    		'kode_booking' => $request->kode_booking,
    	]);

    	//ubah status mobil ke 0
    	$mobil = Mobil::find($request->mobil_id);
        $mobil->status_sewa = '1';
        $mobil->save();

		Alert::toast('Proses Pengembalian Sukses!', 'success');
        return redirect()->route('pengembalian.index');
    }
}
