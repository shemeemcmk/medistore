@extends('frontend.layout.header')
@section('content')




<main id="main">
  <section id="why-us" class="why-us">
    <div class="container mt-4">

     

    </div>
  </section>

  <div class="row my-3">
    <div class="col text-center mb-4">
      <h2 class=""> Contact form</h2>
    </div>
  </dvi>
  <div class="container-fluid mx-4">
      <form action="{{route('add-contact')}}" method="post">
        @csrf
          <div class="form-group row">
              <label for="fname" class="col-sm-3 col-form-label">Full name:</label>
              <div class="col-sm-8">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Full name...">
              </div>
          </div>
          <div class="form-group row">
              <label for="email" class="col-sm-3 col-form-label mt-4">E-mail:</label>
              <div class="col-sm-8 mt-4">
                  <input type="email" class="form-control" id="email" name="email" placeholder="E-mail address...">
              </div>
          </div>
          <div class="form-group row">
              <label for="subject" class="col-sm-3 col-form-label mt-4">subject:</label>
              <div class="col-sm-8 mt-4">
                  <input type="text" class="form-control" id="subject" name="subject" placeholder="subject...">
              </div>
          </div>
          <div class="form-group row">
              <label for="message" class="col-sm-3 col-form-label mt-4">Message:</label>
              <div class="col-sm-8 mt-4">
                <input type="text" class="form-control" id="messege" name="messege" placeholder="messege...">
              </div>
          </div>
          <div class="row">
              <div class="col-sm-8 offset-sm-3 mt-4">
                  <button type="submit" class="btn btn-primary">Send Message</button>
              </div>
          </div>
      </form>
  </div>
  </div>











@endsection