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
            <button class="btn btn-primary">Search</button>
          </div>
          
        </div>
        
      </div>
  </div>
  </div>
</section><!-- End Hero -->






<main id="main">
<section id="services" class="services">
    <div class="container">
        <div class="section-title mt-5">
          <h2 style="color: rgb(23, 59, 122);font-size:50px">Our Products</h2>
        </div>
      </div>
      
      <div class="container mt-5 mb-5">
        <div class="row">
    @foreach ($products as $d)
      <div class="product-card">
        <div class="product-tumb">
            <img src="{{$d->image}}" alt="" style="border-image-width: 80%; border-image-hight: 80%">
        </div>
        <div class="product-details">
            <span class="product-catagory"></span>
            <h4><a href="">{{$d->name}}</a></h4>
            <p>{{$d->catogory}}</p>
            <p>{{$d->price}}</p>
            <div class="product-bottom-details">
                <div class="product-price"><small></small>{{$d->Rating}}</div>
                <div class="product-links">
                    <a href="{{route('productdetials')}}"><i class="fa fa-heart"></i></a>
                    <form action="{{ route('add-to-cart') }}" method="POST" style="display:inline;">
                      @csrf
                      <input type="hidden" name="product_id" value="{{ $d->id }}">
                      <input type="number" name="quantity" value="" min="1" style="width: 30%;">
                      <button type="submit" class="btn btn-link p-0"><i class="fa fa-shopping-cart"></i></button>
                      <a href="{{route("cart")}}"><i class="fa fa-shopping-cart"></i></a>
                  </form>   
                </div>
            </div>
        </div>
    </div>  
    @endforeach
        </div>
      </div>

    </div>
  </section>


  @endsection