<?php

namespace App\Http\Controllers;

use App\Models\petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petugass = Petugas::latest()->paginate(5);
        return view('petugas.index', compact('petugass'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::guard('petugas')->user()->level == 'petugas') {
            return back()->with('error', 'Anda tidak memiliki akses');
        }
        return view('petugas.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_petugas'=>'required',
            'username'=>'required',
            'password'=>'required',
            'jk'=>'required',
            'telp'=>'required',
            'alamat_petugas'=>'required',
            'level'=>'required',
        ]);
        $validateData['password'] = bcrypt($validateData['password']);

        petugas::create($validateData);

        return redirect()->route('petugas.index')->with('success', 'Berhasil Menambahkan Petugas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function show(petugas $petugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::guard('petugas')->user()->level == "petugas"){
            return back()->with('error', 'Tidak bisa mengubah petugas. Level anda harus admin');
        }

        $petugas = Petugas::findOrFail($id);
        return view('petugas.edit', compact('petugas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'nama_petugas'=>'required',
            'username'=>'required',
            'password'=>'required',
            'jk'=>'required',
            'telp'=>'required',
            'alamat_petugas'=>'required',
            'level'=>'required',
        ]);
        $validateData['password']= bcrypt($validateData['password']);

        $petugas = Petugas::findOrFail($id);
        $petugas->update($validateData);

        return redirect()->route('petugas.index')->with('success', 'Berhasil mengubah petugas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::guard('petugas')->user()->level == "petugas"){
            return back()->with('error', 'Tidak bisa menghapus. Level anda harus admin');
        }
        $petugas = petugas::findOrFail($id);
        if ($petugas){
            $petugas->delete();
            return redirect()->route('petugas.index')->with('success','Berhasil Menghapus User');
        }
        return redirect()->route('petugas.index')->with('error','Gagal Menghapus Pengaduan');
    }
}
