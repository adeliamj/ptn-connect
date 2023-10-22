<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Sitem Informasi Mahasiswa')</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Satisfy&display=swap');

        @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,700&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        .navbar {
            background-color: #2124B1 ;
            justify-content: space-between;
        }

        .container .navbar-nav .nav-link {
            color: #fff
        }

        footer {
            text-align: center;

        }

        footer {
            background-color: #2124B1 ;
        }

        footer .container {
            color: #fff;
        }

        .navbar-brand {
            font-weight: bold;
            font-family: 'Satisfy';
            color: #fff;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-nav shadow-sm ms-auto">
        <div class="container">
            <a class="navbar-brand" href="">PTN-Connect</a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('hasil') }}">Kembali</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @section('content')
    @show
    <footer class="py-3 text-black mt-3 shadow-sm">
        <div class="container">
            Copyright © 2023 Kelompok 2 - TI A
        </div>
    </footer>
</body>
</body>

</html>
