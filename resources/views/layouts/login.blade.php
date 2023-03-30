<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container-scroller">
	<div class="container-fluid page-body-wrapper full-page-wrapper">
		<div class="row w-100 m-0">
			<div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
		  		<div class="card col-lg-5 mx-auto my-5 rounded">
					<div class="card-body px-5 py-5">
			  			<h3 class="card-title text-left mb-3">Masuk Untuk Melapor</h3>
							@if(request()->is('login'))
							<form method="POST" action="/login">
								@csrf
								<div class="form-group">
									<label>Username</label>
									<input type="text" name="username" class="form-control p_input">
								</div>
								<div class="form-group">
									<label>Password </label>
									<input type="password" name="password" class="form-control p_input">
									<input type="hidden" name="role" value="petugas">
								</div>
								<div class="d-flex justify-content-between mt-4">
									<p class="">Belum punya akun? <a href="/register">Daftar</a> </p>
									<button type="submit" class="btn-daftar btn btn-secondary col-5">Masuk</button>
								</div>
							</form>
							@else
							<form method="POST" action="/petugas/login">
								@csrf
								<div class="form-group">
									<label>Username</label>
									<input type="text" name="username" class="form-control p_input">
								</div>
								<div class="form-group">
									<label>Password </label>
									<input type="password" name="password" class="form-control p_input">
									<input type="hidden" name="role" value="petugas">
								</div>
								<div class="d-flex justify-content-center mt-4">
									<button type="submit" class="btn-daftar btn btn-secondary col-5">Masuk</button>
								</div>
							</form>
							@endif

		  				</div>
					</div>
					<!-- content-wrapper ends -->
	  			</div>
	  		<!-- row ends -->
			</div>
		<!-- page-body-wrapper ends -->
  	</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  @include('sweetalert::alert')

</body>
</html>
