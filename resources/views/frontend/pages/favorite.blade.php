<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Font Awsome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Css File -->
    <link rel="stylesheet" href="{{ asset('front/pages/css/master.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/pages/css/bootstrap.min.css') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500&display=swap" rel="stylesheet" />
    <!-- Title Page -->

    <title>Favorite Profile</title>

</head>

<body>
    <!-- ================Start Header============== -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <div class="logo">
                Logo <span>here</span>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main"
                aria-controls="main" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="main">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link p-2 p-lg-3 active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-2 p-lg-3" href="#">Coupons</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-2 p-lg-3" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-2 p-lg-3" href="#">Common Questions</a>
                    </li>
                    <!-- <li class="nav-item">
            <a class="nav-link p-2 p-lg-3" href="#">Offers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link p-2 p-lg-3" href="#">Blog</a>
          </li> -->
                </ul>

                <!-- Image -->
                <div class="link btn-group ml-3">
                    <div class="user-iamge">
                        <img src="{{ asset('front/pages/imgs/user-image.png') }}" alt="">
                    </div>
                    <button class="btn text-black-50  btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Mohammed Ali
                    </button>
                    <ul class="dropdown-menu mt-2 text-start">
                        <li>
                            <i class="fa-solid fa-user"></i>

                            <a href="#">My account</a>
                        </li>
                        <li>
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            <a href="{{ route('logout') }}">Sign Out</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </nav>
    <!-- ================End Header============== -->

    <!-- ================Start Main Section============== -->
    <div class="sections  d-flex">
        <!-- Start Sidebar -->
        <sidebar class="sidebar ">
            <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">

                <ul class="nav pt-5 nav-pills flex-column mb-auto ">
                    <li class="nav-item pb-2 ">
                        <a href="./my-account.html" class="nav-link text-black-50  " aria-current="page">
                            <i class="fa-solid fa-user"></i>
                            My Account
                        </a>
                    </li>
                    <li class="pb-2">
                        <a href="./favorite.html" class="nav-link link-dark text-black-50 active">
                            <i class="fa-solid fa-bag-shopping"></i>
                            Favorite
                        </a>
                    </li>
                    <li>
                        <a href="./change-password.html" class="nav-link link-dark text-black-50">
                            <i class="fa-solid fa-gear"></i>
                            Change Password
                        </a>
                    </li>
                </ul>
            </div>
        </sidebar>
        <!-- End Sidebar -->
        <!-- ====================== -->
        <div class="card-tabel">
            <div class="header-text">
                <h3>Cubanati</h3>
                <p>Coupons that you have obtained through us or that you have posted
                    we've got</p>
            </div>
            <!-- Start Tabel -->
            <div class="container">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"
                                        title="Platform">
                                        Filter by Platform
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="#">Namshi</a></li>
                                        <li><a class="dropdown-item" href="#">Floward</a></li>
                                    </ul>
                                </div>
                            </th>
                            <th scope="col">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                        Filter by Status
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                        <li><a class="dropdown-item" href="#">Active</a></li>
                                        <li><a class="dropdown-item" href="#">Inactive</a></li>
                                    </ul>
                                </div>
                            </th>
                            <th scope="col">
                                <label for="searchInput" class="visually-hidden">Search</label>
                                <input type="text" id="searchInput" class="form-control"
                                    placeholder="Find what You want..">
                            </th>
                        </tr>
                        <tr>
                            <th class="header-tabel" scope="col">Coupon</th>
                            <th class="header-tabel" scope="col">Platform name</th>
                            <th class="header-tabel" scope="col">Discounting</th>
                            <th class="header-tabel" scope="col">Status</th>
                            <th class="header-tabel" scope="col">commands</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" class="text-black fw-normal">Has236</th>
                            <td>Namshi</td>
                            <td>10% </td>
                            <td class="green-text">Active</td>
                            <td class="btn">Copy</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-black fw-normal">Has236</th>
                            <td>Namshi</td>
                            <td>10%</td>
                            <td class="green-text">Active</td>
                            <td class="btn">Copy</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-black fw-normal">Has236</th>
                            <td>Namshi</td>
                            <td>10%</td>
                            <td class="green-text">Active</td>
                            <td class="btn">Copy</td>
                        </tr>
                        <tr>
                            <th scope="row " class="text-black fw-normal">Has236</th>
                            <td>Namshi</td>
                            <td>10%</td>
                            <td class="green-text">Active</td>
                            <td class="btn">Copy</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- End Tabel -->
        </div>
    </div>
    <!-- ================End Main Section============== -->


    <!--=============== Start Footer =============== -->
    <div class="footer pt-5 pb-3 text-white-50 text-center text-md-start">
        <div class="container text-center">
            <div class="row ">

                <div class="col-md-12 col-lg-12">
                    <div class="links">
                        <h5 class="text-light">Logo<br> Here</h5>
                        <ul class="list-unstyled  d-flex justify-content-center gap-3 flex-wrap">
                            <li><a class="text-light" href="">Home</a></li>
                            <li><a class="text-white-50" href="">Coupons</a></li>
                            <li><a class="text-white-50" href="">About</a></li>
                            <li><a class="text-white-50" href="">Common Questions</a></li>
                            <!-- <li><a class="text-white-50" href="">Blog</a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=============== End Footer =========== -->
    <script src="{{ asset('front/pages/js/script.js') }}"></script>
    <script defer src="https://use.fontawesome.com/releases/v6.4.0/js/all.js"
        integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
    </script>
    <script src="{{ asset('front/pages/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front/pages/js/all.min.js') }}"></script>
</body>

</html>
