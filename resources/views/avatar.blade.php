<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <title>Avatar Generator</title>
        <style>
            body {
                background-color: lightblue;
            }
            .avatar {
                width: 200px;
                height: 200px;
                border-radius: 50%;
                margin-bottom: 20px;
            }
            .form-control{
                margin-left: 50px;
                width: 600px;
            }
            form {
            margin-top: 50px;
            }
            img {
                margin-top: 30px;
                width: 200px;
                height: 200px;
                border-radius: 50%;
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
                
                <center>
                    <form id="avatar-form" method="POST" action="{{ route('avatar') }}">
                        @csrf
                        <input name="text" class="form-control" type="text" placeholder="Masukkan nama Anda...">
                            <div class="d-grid gap-2 col-10 mx-auto">
                                <br>
                                <button id="generateButton" class="btn btn-success" onclick="generateAvatar()">Buat Profil Picture!</button>
                            </div>
                    </form>
                    <div id="avatar-container"></div>
                </center>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
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

            function generateAvatar() {
            var text = document.querySelector('input[name="text"]').value;
            var imageUrl = 'https://robohash.org/' + encodeURIComponent(text);
            var avatarContainer = document.getElementById('avatar-container');
            avatarContainer.innerHTML = '<img class="avatar" src="' + imageUrl + '" alt="Avatar" />';
            }
            $(document).ready(function() {
                $("#generateButton").on('click', function(e) {
                    e.preventDefault();
                    generateAvatar();
                });
            });
        </script>
    </body>
</html>