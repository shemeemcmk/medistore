@extends('frontend.layout.header')
@section('content')
 
<div class="container mt-5 mb-5">
    <div class="row">
@foreach ($products as $d)
<div class="wrapper">
	<div class="outer">
		<div class="content animated fadeInLeft">
			<span class="bg animated fadeInDown">EXCLUSIVE</span>
			<h1>{{$d->name}}<br>{{$d->price}}</h1>
			<p>Shadow your real allegiance to New York's Pirate radio with this cool cap featuring the Graphic Know Wave logo.</p>
			
			<div class="button">
				<a href="{{route("cart")}}"><i class="fa fa-shopping-cart"></i></a>
               <h2>{{$d->Rating}}</h2>
			</div>
			
		</div>
		<img src="{{$d->image}}" class="imgs">
	</div>
	<p class="footer">Based on the Silk UI Kit - DesignModo Market</p>
</div>
@endforeach
    </div>
</div>


@endsection