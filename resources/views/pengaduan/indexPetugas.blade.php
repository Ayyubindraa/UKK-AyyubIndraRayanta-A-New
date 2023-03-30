@extends('layouts.navbar')
@section('content')
<h4 class="my-3">Daftar Aduan  </h4>
    <!-- <div class="button my-2">
        <a type="button" class="btn btn-success" href="{{ url('/pengaduan/tambah') }}">Buat</a>
    </div> -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    @if (session('error'))
      <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
        <strong>{{ session('error') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col" class="text-center">Tanggal Pengaduan</th>
                <th scope="col">Isi Laporan</th>
                <th scoope="col">Status</th>
                <th scope="col">Foto</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengaduans as $pengaduan)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">{{ $pengaduan->created_at}}</td>
                <td>{{ $pengaduan->isi_laporan }}</td>
                <td>{{ $pengaduan->status }}</td>
                <td><img src="{{ asset($pengaduan->foto) }}" alt="" width="100px"></td>
                <td>
                    <form action="/petugas/pengaduan/delete/{{$pengaduan->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn-primary" href="/petugas/tanggapan/tambah/{{$pengaduan->id}}">Tanggapi</a>

                    <button type="submit" class="btn btn-danger">
                    <img src="{{ asset('assets/icons/trash3.svg') }}" class="mb-1"width="20px" alt="">
                    </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{$pengaduans->links()}}
@endsection
