<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coupon Code</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <!-- Header section -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#0c3c53;">
        <div class="container">
            <a class="navbar-brand text-white" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item text-white" href="#">Action</a></li>
                    <li><a class="dropdown-item text-white" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-white" href="#">Something else here</a></li>
                </ul>
                </li>
               
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-info text-white" type="submit">Search</button>
            </form>
            </div>
        </div>
    </nav>
    <!-- Header section end-->
   <div class="m-5">
   <a href="{{ route('coupons.create') }}" class="btn text-white" style="background-color:#0c3c53;">Create Coupon</a>
   </div>
    <!-- Content -->
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card" style="border-color:#0c3c53; height:450px;">
            <div class="card-body justify-content-center">
              <div class="row justify-content-center text-center">
                  <!-- Error Message -->
                  @if(session()->has('message'))
                      <div class="alert alert-danger">
                          {{ session()->get('message') }}
                      </div>
                  @endif
                  <!-- Error Message -->
                    <h5 class="card-title text-center my-5">Coupon</h5>
                    <p>Product Price : {{$product->price}}  TK</p>
                    <div class="col-md-7">
                    <form action="{{ route('coupon.apply') }}" method="POST" class="d-flex" role="coupon">
                      @csrf
                      <input class="form-control me-2" type="text" name="code" value="{{ old('code') }}" placeholder="Enter Coupon Code" aria-label="Coupon">
                      <button class="btn text-white" type="submit" style="background-color:#0c3c53;">Apply</button>
                    </form>
                    </div>
                    @if(session()->has('total'))
                  <p class="mt-3">Total Price : {{session()->get('total')}} TK</p>
                  @endif
                  <?php
                  session()->forget('total');
                  ?>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Content End-->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>