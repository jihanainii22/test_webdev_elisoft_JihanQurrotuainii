<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <title>EdiT Posts</title>
        <style>
            .btn-container {
                display: flex;
                justify-content: space-between;
            }
            
            .btn-container .btn-primary {
                margin-right: 10px;
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
                
                <div class="container" style="margin-top: 80px">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="card">
                                <div class="card-header">
                                    EDIT POST
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('posts.update', $post->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>TITLE</label>
                                            <input type="text" name="title" placeholder="Masukkan Title" value="{{ $post->title }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Created</label>
                                            <textarea class="form-control" name="content" placeholder="Masukkan Content" rows="4">{{ $post->created_at }}</textarea>
                                        </div>
                                        <div class="btn-grup">
                                            <a href="{{ route('posts.index') }}" class="btn btn-dark">KEMBALI</a>
                                            <button type="submit" class="btn btn-success">UPDATE</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
        <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
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

            CKEDITOR.replace( 'content' );
        </script>
    </body>
</html>