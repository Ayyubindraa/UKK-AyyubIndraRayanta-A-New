<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah Pengaduan</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container-scroller">
	<div class="container-fluid page-body-wrapper full-page-wrapper">
		<div class="row w-100 m-0">
			<div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
		  		<div class="card col-lg-5 mx-auto my-5 rounded">
					<div class="card-body px-5 py-5">
			  			<h4 class="card-title text-left mb-3">Tambah Pengaduan</h4>
						  <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
	@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Maaf!</strong> tanggal pengaduan tidak boleh kosong.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="mt-2">
      <a href="{{ route('pengaduan.index') }}" class="btn btn-success">Kembali</a>
      <div class="row col-md-12">
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
          <div class="form-group">
            <strong>Tanggal :</strong>
            <input type="date" name="tgl_pengaduan" class="form-control">
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Isi Laporan :</strong>
            <textarea name="isi_laporan" class="form-control" cols="30" rows="4"></textarea>
          </div>
        </div>
        <div class="form-group">
            <Strong><label for="exampleFormControlInput1">Alamat Pelapor:</label></Strong>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Alamat">
        </div>
        <div>
            <strong>Kategori Laporan:</strong>
            <form action="proses.php" method="get">
                <p><input type='radio' name='kategori_laporan' value='lingkungan' />Lingkungan</p>
                <p><input type='radio' name='kategori_laporan' value='sosial' />Sosial</p>
                <p><input type='radio' name='kategori_laporan' value='agama' />Agama</p>
                <p><input type='radio' name='kategori_laporan' value='politik' />Politik</p>
          </form>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
          <strong>Foto :</strong>
          <div class="input-group mb-3">
            <input type="file" name="foto" class="form-control" id="inputGroupFile02">
            <input type="hidden" name="nik" class="form-control" value="{{ Auth::guard('masyarakat')->user()->nik }}">
            <!-- <label class="input-group-text" for="inputGroupFile02">Upload</label> -->
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </form>

		  				</div>
					</div>
					<!-- content-wrapper ends -->
	  			</div>
	  		<!-- row ends -->
			</div>
		<!-- page-body-wrapper ends -->
  	</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
