<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .navbar-custom {
            background: linear-gradient(90deg, #8989FF, #6262FF, #3B3BFF);
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
        }
        .nav-link {
            color: white !important;
        }
        .nav-link.active {
            background-color: yellow;
            color: black !important;
            border-radius: 20px;
            padding: 5px 15px;
        }
        .poppins {
    font-family: 'Poppins', sans-serif;
    }

    .fs-small {
        font-size: 14px; /* Kecil */
    }

    .fs-medium {
        font-size: 18px; /* Sedang */
    }

    .fs-large {
        font-size: 24px; /* Besar */
    }

    .fw-light {
        font-weight: 300; /* Tipis */
    }

    .fw-normal {
        font-weight: 400; /* Normal */
    }

    .fw-semibbold {
        font.weight: 600;
    }

    .fw-bold {
        font-weight: 700; /* Tebal */
    }

    .r-1 { border-radius: 4px; }   /* Hampir kotak */
    .r-2 { border-radius: 8px; }   /* Sedikit melengkung */
    .r-3 { border-radius: 12px; }  /* Lebih melengkung */
    .r-4 { border-radius: 16px; }  /* Medium melengkung */
    .r-5 { border-radius: 20px; }  /* Lumayan melengkung */
    .r-6 { border-radius: 30px; }  /* Hampir oval */
    .r-7 { border-radius: 50px; }  /* Sangat oval */


    </style>

<div class="navbar-custom">

<nav class="navbar navbar-expand-lg  px-3 py-4">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand" href="#">
            <img src="https://portal.dinus.ac.id/assets/images/logo_dinus_new.png" alt="Logo" width="110" class="d-inline-block align-text-top">
        </a>
        <h1 class="fs-1 fw-bold poppins text-white">E - Poliklinik Udinus</h1>

        <!-- Button Toggle Navbar untuk Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto poppins fw-light ">
                <li class="nav-item">
                    <a class="nav-link fs-5 active " href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5" href="#">Service</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5" href="#">Tutorial</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5" href="#">Fitur</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="hero-box py-4">
    <p class="poppins fw-semibold text-white text-center" style="font-size: 3.5rem;">
        Udinus Sehat, Udinus Kuat!
    </p>
    <div class="container d-flex justify-content-center mt-3 pb-5">
        <div class="card custom-card shadow r-5 w-75">
            <div class="card-body d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Mau konsultasi kesehatan?</h4>
                <div class="dropdown">
                    <button class="btn dropdown-toggle r-3 text-dark"
                        style="background-color: rgb(250, 250, 2); border: none;"
                        type="button" data-bs-toggle="dropdown">
                        Pilih Poli
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Poli Umum</a></li>
                        <li><a class="dropdown-item" href="#">Poli Gigi</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>



</div>

