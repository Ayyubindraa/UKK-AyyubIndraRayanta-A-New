<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container-scroller">
	<div class="container-fluid page-body-wrapper full-page-wrapper">
	  <div class="row w-100 m-0">
		<div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
		  <div class="card col-lg-5 mx-auto my-5 rounded">
			<div class="card-body px-5 py-5">
			  <h3 class="card-title text-left mb-3">Daftar</h3>
			  <form method="POST" action="/register">
				@csrf
              <div class="form-group">
				  <label>NIK</label>
				  <input placeholder="Masukan NIK" type="text" name="nik" class="form-control p_input">
				</div>
				<div class="form-group">
				  <label>Nama</label>
				  <input placeholder="Masukan Nama" type="text" name="nama" class="form-control p_input">
				</div>
				<div class="form-group">
				  <label>Username</label>
				  <input placeholder="Masukan Username" type="text"name="username" class="form-control p_input">
				</div>
				<div class="form-group">
				  <label>Password </label>
				  <input placeholder="Masukan Password" type="password" name="password" class="form-control p_input">
				  <input type="hidden" name="role" value="petugas">
				</div>
                <div class="form-group">
					<label>Jenis Kelamin</label>
					<select class="form-control" name="jk" id="jk">
						<option class="option-active" value="">Pilih Jenis Kelamin</option>
						<option value="pria">Pria</option>
						<option value="wanita">Wanita</option>
					</select>
				</div>
				<div class="form-group">
				  <label>No Telp </label>
				  <input placeholder="Masukan No Telp" type="number" name="telp" class="form-control p_input">
				</div>
				<label>Alamat</label>
				<div class="form-group">
					<textarea name="alamat_masyarakat" id="alamat_masyarakat" rows="3" class="form-control mb-3"></textarea>
				</div>
				<div class="d-flex justify-content-between mt-4">
                    <p class="">Sudah punya akun? <a href="{{ url('/login') }}">Login</a> </p>
                    <button type="submit" class="btn-daftar btn btn-secondary col-5">Daftar</button>
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
