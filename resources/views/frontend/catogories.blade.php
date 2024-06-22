@extends('frontend.layout.header')
@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container">
      <div class="container">
  
        <div class="row height d-flex justify-content-center align-items-center">
  
          <div class="col-md-8">
  
            <div class="search">
              <i class="fa fa-search"></i>
              <input type="text" class="form-control" placeholder="Search here... ">
              <button class="btn btn-primary">search</button>
            </div>
            
          </div>
          
        </div>
    </div>
    </div>
  </section><!-- End Hero -->
  
  
  
  
  <main id="main">
    <section id="why-us" class="why-us">
      <div class="container mt-4">
  
       
  
      </div>
    </section>
    
    <h1 style="color: black; font-size:50px;">categoris</h1>

    <div class="container mt-5 mb-5">
        <div class="row">
    @foreach ($category as $d)
    <div class="product-card mt-5">
      {{-- <div class="badge">Hot</div> --}}
      <a href="{{route('products', $d->id) }}">
      <div class="product-tumb">
          <img src="{{$d->image}}" alt="" style="border-image-width: 100%; border-image-hight: 100%">
      </div>
      <div class="product-details">
          <span class="product-catagory"></span>
          <h4><a href="">{{$d->catagorie_name}}</a></h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!</p>
          {{-- <div class="product-bottom-details">
              <div class="product-price"><small>$96.00</small>$230.99</div>
              <div class="product-links">
                  <a href=""><i class="fa fa-heart"></i></a>
                  <a href=""><i class="fa fa-shopping-cart"></i></a>
              </div>
          </div> --}}
      </div>
  </div>
  @endforeach
</div>
</div>










@endsection