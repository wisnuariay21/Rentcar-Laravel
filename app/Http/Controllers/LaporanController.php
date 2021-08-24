<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index(Request $request){
    	$data['menu'] = 6;
    	$data['title'] = "Laporan Transaksi";
    	$data['no'] = 1;

		//get / mencari data laporan berdasarkan input tgl
    	if(!isset($_GET['tipe'])) {
	    	return view('laporan/index', $data);
    	} else {
    		$data['data'] = $request->toArray();
    		switch ($request->tipe) {
    			case 'all':
    				$data['bookings'] = Booking::whereBetween('bookings.tgl_order', [$request['start_date'], $request['end_date']])
    				->join('pelanggans', 'pelanggans.pelanggan_id', '=', 'bookings.pelanggan_id')
    				->join('mobils', 'mobils.mobil_id', '=', 'bookings.mobil_id')
    				->get();
    				break;
    			case 'proses' :
    				$data['bookings'] = Booking::where('bookings.status', 'proses')->whereBetween('bookings.tgl_order', [$request['start_date'], $request['end_date']])
    				->join('pelanggans', 'pelanggans.pelanggan_id', '=', 'bookings.pelanggan_id')
    				->join('mobils', 'mobils.mobil_id', '=', 'bookings.mobil_id')
    				->get();
    				break;
    			case 'lunas' :
    				$data['bookings'] = Booking::where('bookings.status', 'lunas')->whereBetween('bookings.tgl_order', [$request['start_date'], $request['end_date']])
    				->join('pelanggans', 'pelanggans.pelanggan_id', '=', 'bookings.pelanggan_id')
    				->join('mobils', 'mobils.mobil_id', '=', 'bookings.mobil_id')
    				->get();
    				break;
    		}
    		if($request->tipe == 'all'){
    			
    		} else if($request->tipe == 'proses'){

    		}
    		
    		return view('laporan/transaksi', $data);
    	}
    	
    }
}
