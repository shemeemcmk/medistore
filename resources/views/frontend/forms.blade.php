<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@200;300&display=swap" rel="stylesheet">

<div>
    <form action="{{route('add-book')}}" method="POST" enctype="multipart/form-data">
        @csrf
    
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..." value="{{ $user['name'] }}">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..." value="{{ $user['name'] }}">

    <label for="email">email</label>
    <input type="text" id="email" name="email" placeholder="email" value="{{ $user['email'] }}">

    <label for="country">address</label>
    <select id="country" name="country">
      <option value="france">France</option>
      <option value="germany">Germany</option>
      <option value="italy">Italy</option>
      <option value="spain">Spain</option>
      <option value="uk">UK</option>
      <option value="india">india</option>
    </select>
    <label for="email">state</label>
    <input type="text" id="state" name="state" placeholder="state">

    <label for="email">pin</label>
    <input type="text" id="pin" name="pin" placeholder="pin">

    @foreach($cartItems as $item)
    <input type="hidden" id="product_id" name="product_id" value="{{ $item->product->id }}">
    
    <input type="hidden" id="quantity" name="quantity" value="{{ $item->quantity }}">
    @endforeach

  
    <input type="submit" value="Submit">
  </form>
</div>



<style type="text/css">
    * {
	box-sizing: border-box;
}

.wrapper {
	display: flex;
	justify-content: center;
	align-items: center;
	font-family: Montserrat;
	background: #f3eff1;
	width: 100%;
	height: 100vh;
}

.outer {
	position: relative;
	background: #fff;
	height: 450px;
	width: 950px;
	overflow: hidden;
	display: flex;
	align-items: center;
}

.imgs {
	position: absolute;
	top: 0px;
	right: -20px;
	z-index: 0;
	animation-delay: 0.5s;
  max-width: 100%;
  max-height: 100%;
}

.content {
	animation-delay: 0.3s;
	position: absolute;
	left: 20px;
	z-index: 3
	
}

h1 {
	color: #111;
}

p {
	width: 280px;
	font-size: 13px;
	line-height: 1.4;
	color: #aaa;
	margin: 20px 0;
	
}

.bg {
	display: inline-block;
	color: #fff;
	background: cornflowerblue;
	padding: 5px 10px;
	border-radius: 50px;
	font-size: .7em;
}
.button {
	width: fit-content;
	height: fit-content;
	margin-top: 10px;
	
	
	
}

.button a {
	display: inline-block;
	overflow: hidden;
	position: relative;
	font-size: 11px;
	color: #111;
	text-decoration: none;
	padding: 10px 15px;
	border: 1px solid #aaa;
	font-weight: bold;
	
	
}

.button a:after{
	content: "";
	position: absolute;
	top: 0;
	right: -10px;
	width: 0%;
	background: #111;
	height: 100%;
	z-index: -1;
	transition: width 0.3s ease-in-out;
	transform: skew(-25deg);
	transform-origin: right;
}

.button a:hover:after {
	width: 150%;
	left: -10px;
	transform-origin: left;
	
}

.button a:hover {
	color: #fff;
	transition: all 0.5s ease;
}


.button a:nth-of-type(1) {
	border-radius: 50px 0 0 50px;
	border-right: none;
}

.button a:nth-of-type(2) {
	border-radius: 0px 50px 50px 0;
}

.cart-icon {
	padding-right: 8px;
	
}

.footer {
	position: absolute;
	bottom: 0;
	right: 0;
}
h2 {
  color: #fbb72c;
}


/* bying form page style */

#radioButtons{
  margin: 5px 0 10px 0;
}

input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #016a70;
  color: white;
  padding: 14px 20px;
  margin-top: 12px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #018c94;
}

div {
  margin: auto;
  width: 30%;
  border-radius: 5px;
  background-color: #ededed;
  padding: 20px;
  font-family: 'Work Sans', sans-serif;
}
</style>