@extends('layouts.navbar')
@section('content')
    <div class="button my-4">
        <a type="button" class="btn btn-success" href="{{ route('generate.pdf') }}">Generate PDF</a>
    </div>
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
    <!-- <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal Tanggapan</th>
                <th scope="col">ID Pengaduan</th>
                <th scope="col">Nama Petugas</th>
                <th scope="col">Tanggapan</th>
                <th scope="col">Status Pengaduan</th>
                <th >Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tanggapans as $tanggapan)
            <tr>
                <td scope="row">{{$tanggapans->firstItem() + $loop->index}}.<td>
                <td>{{ $tanggapan->tgl_tanggapan }}</td>
                <td>{{ $tanggapan->id_pengaduan }}</td>
                <td>{{ $tanggapan->getNamaPetugas->nama_petugas }}</td>
                <td>{{ $tanggapan->tanggapan}}</td>
                <td>
                    <a class="text-decoration-none">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal{{ $loop->index }}">Detail</button>
                    </a>
                    <form action="/pengaduan/delete/{{$tanggapan->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-primary" href="/tanggapan/edit/{{$tanggapan->id}}">Edit</a>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table> -->

    <table class="table  mt-2">
      <thead>
        <tr>
          <th scope="col" class="text-center">No</th>
          <th scope="col" class="text-center">Tanggal Tanggapan</th>
          <th scope="col" class="text-center">ID Pengaduan</th>
          <th scope="col">Nama Petugas</th>
          <th scope="col">Tanggapan</th>
          <th scope="col" class="text-center">Status Pengaduan</th>
          <th scope="col" style="width: 190px">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($tanggapans as $tanggapan)
          <tr>
            <td scope="row" class="text-center">{{ $tanggapans->firstItem() + $loop->index }}.</td>
            <td class="text-center">{{ $tanggapan->created_at}}</td>
            <td class="text-center">{{ $tanggapan->id_pengaduan }}</td>
            <td>{{ $tanggapan->getNamaPetugas->nama_petugas }}</td>
            <td>{{ $tanggapan->tanggapan }}</td>
            <td class="text-center">
              {!!
                $tanggapan->getStatusPengaduan->status == "0" ? '<span class="badge text-bg-secondary">Pending</span>' :
                ($tanggapan->getStatusPengaduan->status == "proses" ? '<span class=" fw-bold text-warning">Proses</span>' : '<span class="fw-bold text-primary">Selesai</span>')
              !!}
            </td>
            <td>
              <a class="text-decoration-none" {{-- href="/pengaduan/edit/{{ $tanggapan->id }}" --}}>
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal{{ $loop->index }}">
                  <img src="{{ asset('assets/icons/detail2.png') }}" class="mb-1"width="20px" alt="">
                </button>
              </a>
              <a class="text-decoration-none" href="/petugas/tanggapan/edit/{{ $tanggapan->id }}">
                <button type="button" class="btn btn-warning btn-sm">
                <img src="{{ asset('assets/icons/edit1.svg') }}" class="mb-1"width="20px" alt="">
              </a>
              <a class="text-decoration-none" href="/petugas/tanggapan/delete/{{ $tanggapan->id }}" onclick="return confirm('Are you sure to delete?')">
                <button type="button" class="btn btn-danger btn-sm ms-1">
                <img src="{{ asset('assets/icons/trash3.svg') }}" class="mb-1"width="20px" alt="">
                </button>
              </a>
            </td>
          </tr>

          <!-- Modal -->
          <div class="modal fade" id="detailModal{{ $loop->index }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $loop->index }}" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="detailModalLabel{{ $loop->index }}">Detail Pengaduan</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <img src="{{ asset($tanggapan->getStatusPengaduan->foto) }}" alt="" class="w-100">
                  {{ $tanggapan->getStatusPengaduan->isi_laporan }}
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </tbody>
    </table>

    {{$tanggapans->links()}}

    <!-- modal -->
    {{--<div class="modal fade" id="detailModal{{ $loop->index }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $loop->index}}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="detailModalLabel{{ $loop->index }}">Detail Pengaduan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset($tanggapan->getStatusPengaduan->foto)}}" alt="" class="w-100">{{$tanggapan->getStatusPengaduan->isi_laporan}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-ds-dismiss="modal">Close</button>
            </div>
        </div>
    </div>--}}
@endsection
