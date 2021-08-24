<?php

namespace App\Http\Controllers;

use App\Merek;
use Illuminate\Http\Request;
use Alert;

class MerekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['menu'] = 2;
        $data['title'] = "Merek Mobil";
        $data['mereks'] = Merek::all();
        $data['no'] = 1;
        return view('merek.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['menu'] = 2;
        $data['title'] = "Tambah Merek Mobil";
        return view('merek.create', $data);
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
            'nama' => 'required'
        ]);

        $insert = Merek::create($request->toArray());
        if($insert == true ){
            Alert::toast('Sukses Tambah Data Merek', 'success');
            return redirect()->route('merek.index');
        } else {
            Alert::toast('Gagal Tambah Data Merek', 'warning');
            return redirect()->route('merek.index');
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
        $data['menu'] = 2;
        $data['title'] = "Edit Merek Mobil";
        $data['merek'] = Merek::find($id);
        return view('merek.edit', $data);
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
        $this->validate($request,[
            'nama' => 'required',
        ]);

        $update = Merek::find($id)->update($request->toArray());
        if($update) {
            Alert::toast('Sukses Edit Data Merek', 'success');
            return redirect()->route('merek.index');
        } else {
            Alert::toast('Gagal Edit Data Merek', 'warning');
            return redirect()->route('merek.index');
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
        $del = Merek::destroy($id);
        return redirect()->route('merek.index');
    }
}
