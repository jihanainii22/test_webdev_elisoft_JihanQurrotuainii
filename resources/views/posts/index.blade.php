<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
        <title>Server Side</title>
        <style>
            .card-body{
                width: 800px;
                margin-left: 20px;
            }
            .btn{
                text-align: left;
            }
        </style>
    </head>
    <body>
        <div class="container" style="margin-top: 50px">
            <div class="row">
                <div class="col-md-3">
                    <ul class="list-group">
                        <li class="list-group-item active">MAIN MENU</li>
                        <a href="{{ route('dashboard.index') }}" class="list-group-item" style="color: #212529;">Dashboard</a>
                        <a href="{{ route('avatar') }}" class="list-group-item" style="color: #212529;">Avatar Generator</a>
                        <a href="{{ route('posts.index') }}" class="list-group-item" style="color: #212529;">Server Side</a>
                        <a href="{{ route('menu_index') }}" class="list-group-item" style="color: #212529;">Logika Nested Menu</a>
                        <a href="#" id="logout" class="list-group-item" style="color: #212529;">Logout</a>
                    </ul>
                </div>
                
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            Datatable Server Side
                        </div>
                        <div class="card-body">
                            <a href="{{ route('posts.create') }}" class="btn btn-md btn-success" style="margin-bottom: 10px">Tambah Data</a>
                            <table class="table table-bordered" id="myTable">
                                <thead>
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Content</th>
                                        <th scope="col">Created</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($posts as $post)
                                    <tr>
                                        <td>{{ $post->title }}</td>
                                        <td>{!! $post->content !!}</td>
                                        <td>{!! $post->created_at !!}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#logout").on('click', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Apakah Anda yakin ingin logout?',
                        showDenyButton: true,
                        showCancelButton: true,
                        confirmButtonText: 'Ya',
                        denyButtonText: `Tidak`,
                    }).then((result) => {
                        if (result.value) {
                            Swal.fire({
                                type: 'success',
                                title: 'Berhasil Logout',
                                text: 'Anda akan diarahkan ke menu login dalam 2 detik',
                                showConfirmButton: false,
                                showCancelButton: false
                            });
                            setTimeout(function() {
                                window.location.href = "{{ route('logout') }}";
                            }, 2000);
                        }
                    });
                });
            });

            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>
    </body>
</html>
