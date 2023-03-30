<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Applikasi Pelaporan Pengaduan Masyarakat</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <h6 class="navbar-brand ms-4 " href="#">Form Pengaduan Masyarakat</h6>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ">
      <li class="nav-item active">
      @if (Auth::guard('masyarakat')->user())
              <a class="{{ request()->is('pengaduan') ? 'active' : '' }} nav-link" href="{{ route('pengaduan.index') }} ">Daftar Aduan</a>
            @endif
      </li>
            <li>
              <a class="nav-link" href="{{ route('logout') }}">Logout</a>

            </li>
    </ul>
  </div>
</nav>

  <!-- <nav class="navbar bg-primary navbar-expand-lg justify-content-between" data-bs-theme="dark">
      <h5>Form Pengaduan Masyarakat</h5>
            @if (Auth::guard('masyarakat')->user())
              <a class="{{ request()->is('pengaduan') ? 'active' : '' }} nav-link text-white" href="{{ route('pengaduan.index') }} ">Daftar Aduan</a>
            @endif
            @if (Auth::guard('petugas')->user())
              <a class="{{ request()->is('petugas/masyarakat') ? 'active' : '' }} nav-link text-white" href="{{ route('masyarakat.index') }}">Daftar Masyarakat</a>
              <a class="{{ request()->is('petugas/petugas') ? 'active' : '' }} nav-link text-white" href="{{ route('petugas.index') }}">Daftar Petugas</a> 
            @endif
              <a class="nav-link text-white" href="{{ route('logout') }}">Logout</a>
  </nav> -->
  
  <div class="container">
    @yield('content')
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>