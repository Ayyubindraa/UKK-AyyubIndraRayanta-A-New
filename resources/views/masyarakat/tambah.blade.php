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
			  			<h3 class="card-title text-left mb-3">Menanggapi</h3>
							<form method="POST" action="/login">
								@csrf
								<div class="form-group">
									<label>NIK</label>
									<input type="number" name="nik" class="form-control p_input">
								</div>
                                <div class="form-group mt-2">
									<label>Nama</label>
									<input type="text" name="nama" class="form-control p_input">
								</div>
                                <div class="form-group mt-2">
									<label>Username</label>
									<input type="text" name="username" class="form-control p_input">
								</div>
                                <div class="form-group mt-2">
									<label>Password </label>
									<input type="password" name="password" class="form-control p_input">
									<input type="hidden" name="role" value="petugas">
								</div>
                                <div class="form-group mt-2">
									<label>No Telp</label>
									<input type="number" name="password" class="form-control p_input">
								</div>

								<div class="d-flex justify-content-center mt-4">
									<button type="submit" class="btn-daftar btn btn-primary col-5">Tambah</button>
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
