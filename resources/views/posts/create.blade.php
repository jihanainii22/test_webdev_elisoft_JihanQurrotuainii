<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <title>Create Posts</title>
        <style>
            .container {
                margin-top: 50px;
            }
            .col-md-8.offset-md-2 {
                margin: 0 auto;
                margin-left: 10px;
                float: none;
            }
            .card{
                text-align: left;
                width: 800px;
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
                    @if(Request::is('posts/create'))
                        <div class="card">
                            <div class="card-header">
                                TAMBAH POST
                            </div>
                            <div class="card-body">
                                <form action="{{ route('posts.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>TITLE</label>
                                        <input type="text" name="title" placeholder="Masukkan Title" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>CONTENT</label>
                                        <textarea class="form-control" name="content" placeholder="Masukkan Content" rows="4"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-success">SIMPAN</button>
                                    <button type="reset" class="btn btn-warning">RESET</button>
                                </form>
                            </div>
                        </div>
                    @elseif(Request::is('posts'))
                        <div class="card">
                            <div class="card-header">
                                POSTS
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Content</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($posts as $post)
                                        <tr>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->content }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
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
