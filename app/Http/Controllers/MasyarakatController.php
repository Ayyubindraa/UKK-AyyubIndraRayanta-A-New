<?php

namespace App\Http\Controllers;

use App\Models\masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masyarakats = masyarakat::latest()->paginate(5);
        return view('masyarakat.index', compact('masyarakats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function show(masyarakat $masyarakat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function edit(masyarakat $masyarakat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, masyarakat $masyarakat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::guard('petugas')->user()->level=='petugas'){
            return back()->with('error', 'Tidak bisa menghapus');
        }

        $masyarakat = masyarakat::findOrFail($id);
        if ($masyarakat){
            $masyarakat->delete();
            return redirect()->route('masyarakat.index')->with('success', 'Berhasil Dihapus');
        }
        return redirect()->route('masyarakat.index')->with('error', 'Gagal Dihapus');
    }
}
