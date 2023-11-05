<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Latihan Back end pertemuan 4</title>
    
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>
 
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card mt-5">
                    <div class="card-body">
                        <h3>Data Agama</h3>
                        <h3 class="my-4">Data Kamu nih Puh Sepuh : </h3>
 
                        <table class="table table-bordered table-striped">
                            <tr>
                                <td style="width:300px">Nama</td>
                                <td>{{ $data->nama }}</td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td>{{ $data->pekerjaan }}</td>
                            </tr>
                            <tr>
                                <td>Usia</td>
                                <td>{{ $data->usia }}</td>
                            </tr>
                        </table>
 
                        <a href="/input" class="btn btn-primary">Kembali</a>
                        <a href="/input" class="btn btn-danger">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
</body>
</html>