<?php

namespace App\Http\Controllers;

use App\Mobil;
use App\Merek;
use Illuminate\Http\Request;
use Alert;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Data Mobil";
        $data['menu'] = 1;
        $data['mobils'] = Mobil::all();
        $data['no'] = 1;
        return view('mobil.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Tambah Mobil";
        $data['menu'] = 1;
        $data['mereks'] = Merek::all();
        
        return view('mobil.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mobils = Mobil::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('front/images/',$request->file('foto')->getClientOriginalName());
            $mobils->foto = $request->file('foto')->getClientOriginalName();
            $mobils->save();
        }
        if($mobils){
            Alert::toast('Sukses Tambah Data Mobil', 'success');
            return redirect()->route('mobil.index');
        } else {
            Alert::toast('Gagal Tambah Data Mobil', 'warning');
            return redirect()->route('mobil.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Mobil $mobil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = "Edit Mobil";
        $data['menu'] = 1;
        $data['mobils'] = Mobil::find($id);
        $data['mereks'] = Merek::all();
        
        return view('mobil.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $mobils = Mobil::find($id);
        $mobils->update($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('front/images/',$request->file('foto')->getClientOriginalName());
            $mobils->foto = $request->file('foto')->getClientOriginalName();
            $mobils->save();
        }
        
        if($mobils){
            Alert::toast('Sukses Edit Data Mobil', 'success');
            return redirect()->route('mobil.index');
        } else {
            Alert::toast('Gagal Edit Data Mobil', 'warning');
            return redirect()->route('mobil.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mobil::destroy($id);
        return redirect()->route('mobil.index');
    }
}
