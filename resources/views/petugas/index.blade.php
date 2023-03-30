@extends('layouts.navbar')
@section('content')
<h4 class="my-3">Daftar Petugas</h4>
    <div class="button my-2">
        <a type="button" class="btn btn-success" href="{{ url('/petugas/petugas/tambah') }}">Buat</a>
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
    <table class="table">
        <thead>
            <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col">Nama Petugas</th>
                <th scope="col">Username</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col" >No.Telepon</th>
                <th scope="col">Alamat</th>
                <th scope="col">Level</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($petugass as $petugas)
            <tr>
                <td scope="row" class="text-center">{{ $petugass->firstItem() + $loop->index }}.</td>
                <td>{{ $petugas->nama_petugas }}</td>
                <td>{{ $petugas->username }}</td>
                <td>{{ $petugas->jk }}</td>
                <td>{{ $petugas->telp }}</td>
                <td>{{ $petugas->alamat_petugas }}</td>
                <td>{{ $petugas->level }}</td>
                <td>
                    <form action="/petugas/petugas/delete/{{$petugas->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn-primary" href="/petugas/petugas/edit/{{$petugas->id}}">
                    <img src="{{ asset('assets/icons/edit1.svg') }}" class="mb-1"width="20px" alt="">
                    </a>

                    <button type="submit" class="btn btn-danger">
                    <img src="{{ asset('assets/icons/trash3.svg') }}" class="mb-1"width="20px" alt="">
                    </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{$petugass->links()}}
@endsection
