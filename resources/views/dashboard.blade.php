<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PT Chipi Chapa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand">PT Chipi Chapa</a>
            <a class="btn btn-danger" type="submit" href="logout">Logout</a>
        </div>
    </nav>
      
      <div class="d-grid gap-2">
        <a href="add-karyawan" class="btn btn-primary" type="button">Tambah Karyawan</a>
      </div>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama</th>
            <th scope="col">Umur</th>
            <th scope="col">Alamat</th>
            <th scope="col">No. Telpon</th>
            <th scope="col">Delete</th>
            <th scope="col">Update</th>
          </tr>
        </thead>
        <tbody>
            @if ($list_karyawan->isEmpty())
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data karyawan</td>
                </tr>
            @else
                @foreach ($list_karyawan as $index => $karyawan)
                    <tr>
                        <td>{{ $karyawan->id }}</td>
                        <td>{{ $karyawan->nama }}</td>
                        <td>{{ $karyawan->umur }}</td>
                        <td>{{ $karyawan->alamat }}</td>
                        <td>{{ $karyawan->telepon }}</td>
                        <td>
                            <form action="" method="post">
                                @csrf
                                <a type="submit" class="btn btn-danger" href="/delete-karyawan/{{ $karyawan->id }}">Delete</a>
                            </form>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="/update-karyawan-page/{{ $karyawan->id }}">Update</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>        
      </table>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
