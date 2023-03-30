<?php

namespace App\Http\Controllers;
use App\Models\tanggapan;
use App\Models\pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class TanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tanggapans = tanggapan::latest()->with('getNamaPetugas', 'getStatusPengaduan')->paginate(5);
        return view('tanggapan.index', compact('tanggapans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_pengaduan)
    {
        $pengaduan = pengaduan::find($id_pengaduan);
        if($pengaduan->status == "Selesai"){
            return back()->with('error', 'Status pengaduan sudah selesai. Tidak dapat memberi tanggapan.');
        }
        return view('tanggapan.tambah', compact('pengaduan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_pengaduan)
    {
        $request->validate([
            'id_pengaduan'=> 'required',
            'tgl_tanggapan'=> 'required',
            'tanggapan'=> 'required',
            'id_petugas'=> 'required',
        ]);

        $updateStatus = pengaduan::findOrFail($id_pengaduan);
        $updateStatus->status = $request->status;
        $updateStatus->update();

        $data = new tanggapan;
        $data->id_pengaduan = $id_pengaduan;
        $data->tgl_tanggapan = $request->tgl_tanggapan;
        $data->tanggapan = $request->tanggapan;
        $data->id_petugas = $request->id_petugas;
        $data->save();

        return redirect()->route('tanggapan.index')->with('success', "Berhasil memberi tanggapan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function show(tanggapan $tanggapan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
       $tanggapan = tanggapan::find($id);
       $pengaduan = pengaduan::find($tanggapan->id_pengaduan);
       return view('tanggapan.edit', compact('pengaduan', 'tanggapan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tanggapan $tanggapan, $id)
    {
        $request->validate([
            'id_pengaduan'=> 'required',
            'tgl_tanggapan'=> 'required',
            'tanggapan'=> 'required',
            'id_petugas'=> 'required',
        ]);

        $updateStatus = pengaduan::findOrFail($request->id_pengaduan);
        $updateStatus->status = $request->status;
        $updateStatus->update();

        $data = tanggapan::findOrFail($id);
        $data->tgl_tanggapan = $request->tgl_tanggapan;
        $data->tanggapan = $request->tanggapan;
        $data->id_petugas = $request->id_petugas;
        $data->update();

        return redirect()->route('tanggapan.index')->with('success', "Berhasil memberi tanggapan.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_tanggapan)
    {
        $tanggapan = tanggapan::findOrFail($id_tanggapan);
        if ($tanggapan){
            $tanggapan->delete();
            return redirect()->route('tanggapan.index')->with('success', "Berhasil menghapus pengaduan");
        }
        return redirect()->route('tanggapan.index')->with('error', "Gagal menghapus pengaduan"); 
    }

    public function generatePDF()
    {
       $admin = Auth::guard('petugas')->user()->nama;
       $tanggapans = tanggapan::latest()->with('getNamaPetugas', 'getStatusPengaduan')->get();

       $data = [
        'judul' => "Generate Tanggapan dan Pengaduan",
        'admin' => $admin,
        'tanggapans' => $tanggapans,
       ];

       $pdf = Pdf::loadView('tanggapan.generate_pdf', $data)->setPaper('a4', 'landscape');
       return $pdf->stream();
    }
}
