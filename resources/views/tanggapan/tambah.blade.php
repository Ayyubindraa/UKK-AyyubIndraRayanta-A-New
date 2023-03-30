<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah tanggapan</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container-scroller">
	<div class="container-fluid page-body-wrapper full-page-wrapper">
		<div class="row w-100 m-0">
			<div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
		  		<div class="card col-lg-5 mx-auto my-5 rounded">
					<div class="card-body px-5 py-5">
			  			<h3 class="card-title text-left mb-3">Menanggapi</h3>
						  <form action="{{ route('tanggapan.store', $pengaduan->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
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
    <div class="mt-2">
      <a href="{{ route('tanggapan.index') }}" class="btn btn-success">Kembali</a>
      <div class="row col-md-12">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Tanggal :</strong>
            <input type="date" name="tgl_tanggapan" class="form-control">
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Status :</strong>
            <div class="d-flex">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status1" value="proses" checked>
                    <label class="form-check-label" for="status">
                        Proses
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status2" value="selesai" checked>
                    <label class="form-check-label" for="status2">
                        Selesai
                    </label>
                </div>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
            <div class="form-group">
                <strong>Tanggapan :</strong>
                <textarea name="tanggapan" class="form-control" cols="30" rows="4"></textarea>
            </div>
        </div>
        <input type="hidden" name="id_petugas" class="form-control" value="{{ Auth::guard('petugas')->user()->id}}">
        <input type="hidden" name="id_pengaduan" class="form-control" value="{{ $pengaduan->id }}">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
      <div class="col-md-1"></div>

      <div class="card col-md-5">
        <img src="{{ asset($pengaduan->foto)}}" alt="foto aduan" class="w-100">
        <div class="card-body">
            <p class="card-text">{{ $pengaduan->isi_laporan }}</p>
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
