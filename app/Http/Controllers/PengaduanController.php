<?php

namespace App\Http\Controllers;
use App\Models\Tanggapan;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengaduans = pengaduan::where('nik', Auth::guard('masyarakat')->user()->nik)->latest()->paginate(5);
        return view('pengaduan.index', compact('pengaduans'));
    }
    public function indexPetugas()
    {
        $pengaduans = pengaduan::latest()->paginate(5);
        return view('pengaduan.indexPetugas', compact('pengaduans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengaduan.tambah');
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
            'tgl_pengaduan' => 'required',
            'isi_laporan' => 'required',
            'foto' => 'image|mimes:jpg,svg,png',
            'nik' => 'required',
        ]);

        if ($request->file('foto')) {
            $fileImage = hexdec(uniqid() . "." . $request->foto->extension());
            Image::make($request->file('foto'))->save('assets/images' . $fileImage);
            $pengaduanImage = 'assets/images' . $fileImage;

            $validateData['foto'] = $pengaduanImage;
            $validateData['status'] = "pending";

            Pengaduan::create($validateData);

        } else {
            $validateData['foto'] = "-";
            $validateData['status'] = "pending";

            Pengaduan::create($validateData);
        }
        return redirect()->route('pengaduan.index')->with('success', 'Berhasil Membuat Laporan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function show(pengaduan $pengaduan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengaduan = pengaduan::find($id);
        return view('pengaduan.edit', compact('pengaduan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->file('foto')){
            $fileImage = hexdec(uniqid()). "." . $request->foto->extension();
            Image::make($request->file('foto'))->save('assets/images/' .$fileImage);
            $pengaduanImage = 'assets/images/' . $fileImage;

            $data = pengaduan::findOrFail($id);
            $data->tgl_pengaduan = $request->tgl_pengaduan;
            $data->isi_laporan = $request->isi_laporan;
            $data->foto = $pengaduanImage;
            $data->update();
        }else{
            $data = Pengaduan::findOrFail($id);
            $data->tgl_pengaduan = $request->tgl_pengaduan;
            $data->isi_laporan = $request->isi_laporan;
            $data->foto = $request->foto_lama;
            $data->update();
        }
        return redirect()->route('pengaduan.index')->with('sukses', 'Berhasil Mengubah Pengaduan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengaduan = pengaduan::findOrFail($id);
        $tanggapan = tanggapan::where('id_pengaduan', $id);
        if ($pengaduan && $tanggapan){
            $pengaduan->delete();
            $tanggapan->delete();
            if (Auth::guard('masyarakat')->user()){
                return redirect()->route('pengaduan.index')->with('sukses', 'Berhasil Menghapus Pengaduan');
            }else{
                return redirect()->route('pengaduan.indexPetugas')->with('sukses', 'Berhasil menghapus pengaduan.');
            }
        }
    }
}
