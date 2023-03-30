<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SiNgadu | Pengaduan Masyarakat Sulawesi </title>
    </head>
    <style>
        .kop-judul {
            text-align: center
            padding-top: 100px;
            padding-right: 350px;
            margin-bottom: 15px;
        }
        .kop-image {
            float: left;
            padding-left: 300px
        }
        hr {
            border-color: black;
            margin-top: 2px;
        }
    </style>
    <body>
        <div id="kop">
            <div>
                <h2 class="kop-judul"><img class="kop-image" src="{{ ('images/test.png') }}" width="75px" height="75px" alt="">Laporan Pengaduan Masyarakat Provinsi Sulawesi Tenggara</h2>
                <hr>
            </div>
        </div>
        <center>
            <span>LAPORAN PENGADUAN MASYARAT</span>
            <br>
            <span><strong>Nama Petugas:</strong>{{ Auth::guard('petugas')->user()->nama_petugas}}</span>
            <table align="center" border="1" cellpadding="2" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Isi Laporan</th>
                        <th>Isi Tanggapan</th>
                        <th>Tanggal Tanggapan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tanggapans as $tanggapan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $tanggapan->getStatusPengaduan->nik }}</td>
                        <td>{{ $tanggapan->getStatusPengaduan->getStatusMasyarakat->name }}</td>
                        <td>{{ $tanggapan->created_at }}</td>
                        <td>{{ $tanggapan->getStatusPengaduan->isi_laporan }}</td>
                        <td>{{ $tanggapan->tanggapan }}</td>
                        <td>{{ $tanggapan->tgl_tanggapan }}</td>
                        <td>{{ $tanggapan->getStatusPengaduan->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </center>
    </body>
</html>
