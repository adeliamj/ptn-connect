<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil - PTN Connect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,700&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    @extends('layout.master')
    @section('isi', 'active')
    @section('content')

        <main role="main" class="flex-shrink-0">
            <div class="container mt-5 data">
                <form action="" method="GET">
                    <h2 class="text-center">Profil Pengguna</h2>
                    <div class="row mt-4">
                        <div class="col-sm-2">
                            <h4><label for="nama" class="form-label">Username:</label></h4>
                        </div>
                        <div class="col-sm">
                            <h4><p>{{$user->username}}</p></h4>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-2">
                            <h4><label for="email" class="form-label">Email:</label></h4>
                        </div>
                        <div class="col-sm">
                            <h4><p>{{$user->email}}</p></h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-7">
                            <a class="btn btn-primary" href="forget-password">
                                {{ __('Edit Password') }}
                            </a>
                            <a class="btn btn-danger" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </main>

        @parent
    @endsection
</body>

</html>
