<?php

namespace App\Http\Controllers;

use App\Karyawan;
use Illuminate\Http\Request;
use Alert;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Karyawan";
        $data['menu'] = 3;
        $data['karyawans'] = Karyawan::all();
        $data['no'] = 1;
        return view('karyawan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Tambah Karyawan";
        $data['menu'] = 3;
        return view('karyawan.create', $data);
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
            'name' => 'required|string|max:150',
            'email' => 'required|string|max:150|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if($this) {
            $input = [];
            $input['name'] = $request->name;
            $input['email'] = $request->email;
            $input['password'] = bcrypt($request->password);
            $insert = Karyawan::create($input);
            if($insert) {
                Alert::toast('Sukses Tambah Karyawan!', 'success');
                return redirect()->route('karyawan.index');
            } else {
                Alert::toast('Gagal Tambah Karyawan!', 'danger');
                return redirect()->route('karyawan.index');
            }
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
        $data['title'] = "Edit Data Karyawan";
        $data['menu'] = 3;
        $data['karyawans'] = Karyawan::find($id);
        return view('karyawan.edit', $data);
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
            'name' => 'required|string|max:150',
            
        ]);
        $karyawan = Karyawan::find($id);

        if($request->email == $karyawan->email){
            $update = Karyawan::find($id)->update([
                'name' =>  $request['name'], 
            ]); 
            Alert::toast('Sukses Edit Karyawan!', 'success');
            return redirect()->route('karyawan.index');
        } else {
            $update = Karyawan::find($id)->update($request->toArray());
            if($update) {
                Alert::toast('Sukses Edit Karyawan!', 'success');
                return redirect()->route('karyawan.index');
            } else {
                Alert::toast('Gagal Edit Karyawan!', 'danger');
                return redirect()->route('karyawan.index');
            }
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
        //
    }
}
