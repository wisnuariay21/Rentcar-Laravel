<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Booking;
use App\Mobil;
use App\Pelanggan;
use App\Pengembalian;
use RealRashid\SweetAlert\Facades\Alert;

class BookingController extends Controller
{
    public function index()
    {
        $data['title'] = 'Booking';
        $data['mobils'] = Mobil::where('status_sewa', "1")->get();
        //$data1['mobils'] = Mobil::where('status', "1")->get();
        
        //return view('booking.index', compact('mobils'));
        return view('booking.index', $data);
    }
    public function mobil()
    {
        $data['mobils'] = Mobil::where('status_sewa', "1")->get();
        //return view('pengguna.booking', compact('mobils'));
        return view('booking.mobil', $data);
    }

    //untuk cari nama pelanggan
    public function listMember(){
        $get = $_GET['data'];
        $data = DB::table('pelanggans')->where('nama', 'like', "%$get%")->get();
        //$data = Pelanggan::where('nama', 'like', "%$get%")->get();
    
		$output = "<ul class='ul-pelanggan'>";
		if(count($data) != 0){
			foreach($data as $row){
				$output .= "<li class='li-pelanggan'>".$row->pelanggan_id. " - " .$row->nama."</li>";
			}
		}else {
			$output .= '<li class="li-client-null">Belum mendaftar? <a href="" data-toggle="modal" data-target="#clientModal"> Klik disini untuk daftar!</a></li>';
		}
		echo $output;
    }

    public function createClient(request $request){
        $this->validate($request,[
            'nik' => 'required',
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
            'jenkel' => 'required',
        ]);

        if($this) {
            $insert = Pelanggan::create($request->toArray());
            Alert::success('Pendaftaran Sukses!', 'Selanjutnya Silahkan Isi Formulir Booking');
            return redirect()->route('booking.index');
        }
    }

    public function hitung(Request $request){
        //validate 
        $this->validate($request,[
            'kode_booking' => 'required|unique:bookings',
            'tgl_order' => 'required',
            'durasi' => 'required',
        ]);

        //get tgl kembali
        $durasi = $request->durasi;
        $tgl_order = $request->tgl_order;
        $tgl_kembali = date('Y-m-d', strtotime('+'.$durasi.' days', strtotime($tgl_order)));

        //get supir
        $supir = $request->supir;
        $tujuan = $request->tujuan;
        if($request->supir == 'dengan_supir' and $request->tujuan == 'dalam_kota'){
            $supir = 200000;
            $tujuan = 'dalam_kota';
        }else if($request->supir == 'tanpa_supir' and $request->tujuan == 'dalam_kota'){
            $supir = 0;
            $tujuan = 'dalam_kota';
        }else if($request->supir == 'tanpa_supir' and $request->tujuan == 'luar_kota'){
            $supir = 0;
            $tujuan = 'luar_kota';
        }else if($request->supir == 'dengan_supir' and $request->tujuan == 'luar_kota'){
            $supir = 0;
            $tujuan = 'luar_kota';
            Alert::info('Untuk pemesanan luar kota dengan pengemudi, harap menghubungi kontak');
            return redirect()->route('booking.index');
        }

        //get total harga
        $mobil = Mobil::find($request->mobil_id);
        $total_harga = $mobil->harga_sewa * $durasi + $supir;

        //get dp minimum (30% dari total harga)
        $dp = ($total_harga * 30) / 100;


        //get input 
        $data = $request->toArray();

        //get pelanggan
        $pelanggan = Pelanggan::find($request->pelanggan_id);
        
        //return view('pengguna.booking-details', compact('tgl_kembali', 'data', 'mobil', 'total_harga', 'dp', 'pelanggan'));
        return view('booking.details', compact('tgl_kembali', 'data', 'mobil', 'total_harga', 'dp', 'supir', 'tujuan', 'pelanggan'));
        
    }

    public function proses(Request $request){
        //validate 
        $this->validate($request,[
            'kode_booking' => 'required|unique:bookings',
            'tgl_order' => 'required',
            'durasi' => 'required',
            'pelanggan_id' => 'required|integer',
            'mobil_id' => 'required|integer',
            'tgl_kembali_harusnya' => 'required',
            'supir' => 'required',
            'tujuan' => 'required',
            'harga' => 'required|integer',
            'tipe' => 'required',
            'jumlah' => 'required|integer'
        ]);
        


        //insert to table booking
        $insert_booking = Booking::create([
            'kode_booking' => $request->kode_booking,
            'tgl_order' => $request->tgl_order,
            'durasi' => $request->durasi,
            'tgl_kembali_harusnya' => $request->tgl_kembali_harusnya,
            'supir' => $request->supir,
            'tujuan' => $request->tujuan,
            'harga' => $request->harga,
            'status' => 'proses',
            'mobil_id' => $request->mobil_id,
            'pelanggan_id' => $request->pelanggan_id,
        ]);
        
        //insert to payment
        $insert_payment = Pengembalian::create([
            'tipe' => $request->tipe,
            'jumlah' => $request->jumlah,
            'tanggal' => date('Y-m-d'),
            'pelanggan_id' => $request->pelanggan_id,
            'kode_booking' => $request->kode_booking,
        ]);

        //update mobil status tdk tersedia (0)
        $mobils = Mobil::find($request->mobil_id);
        $mobils->status_sewa = '0';
        $mobils->save();

        //$request->session()->flash('success', 'Transaksi Berhasil, silahkan datang ke kantor, untuk melakukan pembayaran & pengambilan mobil!');
        Alert::success('Transaksi Berhasil', 'silahkan datang ke kantor, untuk melakukan pembayaran & pengambilan mobil!');
        return redirect()->route('booking.index');
    }
}
