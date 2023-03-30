<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container-scroller">
	<div class="container-fluid page-body-wrapper full-page-wrapper">
		<div class="row w-100 m-0">
			<div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
		  		<div class="card col-lg-5 mx-auto my-5 rounded">
					<div class="card-body px-5 py-5">
			  			<h3 class="card-title text-left mb-3">Add New</h3>
						  <form action="{{ route('petugas.update', ['id'=>$petugas->id]) }}" method="POST" enctype="multipart/form-data">
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
      <a href="{{ route('petugas.index') }}" class="btn btn-success">Kembali</a>
      <div class="row col-md-12">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Nama Petugas</strong>
            <input type="text" name="nama_petugas" value="{{$petugas->nama_petugas}}" class="form-control">
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Username</strong>
            <input type="text" name="username" value="{{$petugas->username}}" class="form-control">
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Password</strong>
            <input type="password" name="password" value="{{$petugas->password}}" class="form-control">
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jenis Kelamin</strong>
                <select class="form-control" name="jk" id="jk">
                    <option class="option-active" value="">Pilih Jenis Kelamin</option>
                    <option value="pria">Pria</option>
                    <option value="wanita">Wanita</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Telp</strong>
            <input type="number" name="telp" value="{{$petugas->telp}}" class="form-control">
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Alamat</strong>
              <input type="text" name="alamat_petugas" value="{{$petugas->alamat_petugas}}" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Level :</strong>
            <select name="level" class="form-control">
              <option value="Petugas" @if($petugas->level == "Petugas") selected @endif>Petugas</option>
              <option value="Admin" @if($petugas->level == "Admin") selected @endif>Admin</option>
            </select>
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
