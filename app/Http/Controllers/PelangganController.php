<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['menu'] = 4;
        $data['no'] = 1;
        $data['title'] = "Pelanggan";
        $data['pelanggans'] = Pelanggan::all();
        return view('pelanggan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('booking.daftar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nik' => 'required|integer|unique:pelanggans',
            'nama' => 'required|string|max:150',
            'tanggal_lahir' => 'required',
            'telepon' => 'required|max:15',
            'alamat' => 'required',
            'jenkel' => 'required',
        ]);

        if($this) {
            $insert = Pelanggan::create($request->toArray());
            //$request->session()->flash('success', 'Pendaftaran Sukses!, Selanjutnya Silahkan Isi Formulir Booking');
            Alert::success('Pendaftaran Sukses!', 'Selanjutnya Silahkan Isi Formulir Booking');
            //return redirect()->route('pelanggan.index');
            return redirect()->route('booking.index');
        }
        else {
            Alert::success('Pendaftaran Gagal!', 'Error');
            return redirect()->route('booking.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['menu'] = 4;
        $data['no'] = 1;
        $data['title'] = "Edit Pelanggan";
        $data['pelanggans'] = Pelanggan::find($id);
        return view('pelanggan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = Pelanggan::find($id);
        
        if($client->nik == $request->nik){
            $this->validate($request,[
                'nama' => 'required|string|max:150',
                'tanggal_lahir' => 'required',
                'telepon' => 'required|max:15',
                'alamat' => 'required',
                'jenkel' => 'required',
            ]);
        } else {
            $this->validate($request,[
                'nama' => 'required|string|max:150',
                'nik' => 'required|integer|unique:pelanggans',
                'tanggal_lahir' => 'required',
                'telepon' => 'required|max:15',
                'alamat' => 'required',
                'jenkel' => 'required',
            ]);
        }

        if($this) {
            $insert = Pelanggan::find($id)->update($request->toArray());
            Alert::toast('Sukses Edit Pelanggan!', 'success');
            return redirect()->route('pelanggan.index');
        }
        else {
            Alert::toast('Gagal Edit Pelanggan!', 'warning');
            return redirect()->route('pelanggan.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pelanggan::destroy($id);
        return redirect()->route('pelanggan.index');
    }
}
