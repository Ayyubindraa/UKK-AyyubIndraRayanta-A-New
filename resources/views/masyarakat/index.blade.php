@extends('layouts.navbar')
@section('content')
    <h4 class="my-3">Daftar Masyarakat</h4>
    <!-- <div class="button my-2">
        <a type="button" class="btn btn-success" href="{{ url('/masyarakat/tambah') }}">Tambah</a>
    </div> -->
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">NIK</th>
                <th scope="col">Nama</th>
                <th scoope="col">Username</th>
                <th scope="col">No Telp</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($masyarakats as $masyarakat)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $masyarakat->nik}}</td>
                <td>{{ $masyarakat->nama}}</td>
                <td>{{ $masyarakat->username}}</td>
                <td>{{ $masyarakat->telp}}</td>
                <td>
                    <form action="/petugas/masyarakat/delete/{{$masyarakat->id}}" method="POST">

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                    <img src="{{ asset('assets/icons/trash3.svg') }}" class="mb-1"width="20px" alt="">
                    </button>
                    </form>
                </td>
            </tr>
           @endforeach
        </tbody>
    </table>

    {{$masyarakats->links()}}
@endsection
