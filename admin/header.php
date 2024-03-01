<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"/>
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.10/datatables.min.css" rel="stylesheet">
</head>
<body>
<!-- top navigation bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold" href="#">Sales and Inventory System</a><button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar" aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="topNavBar">
            <form class="d-flex ms-auto my-3 my-lg-0">
                <div class="input-group">
                    <input class="form-control" type="search" placeholder="Search"aria-label="Search"/>
                    <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                </div>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle ms-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-fill"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- top navigation bar -->