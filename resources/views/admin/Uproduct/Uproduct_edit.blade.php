@extends('admin.layout.header')
@section('content')


<div class="main-content container-fluid">
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Multiple Column</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{route('update-uproduct')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <input type="hidden" name="uproducts_id" value="{{$uproducts->id}}">
                                            <label for="first-name-column"> Name</label>
                                            <input type="text" id="name" class="form-control" placeholder="First Name" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">price</label>
                                            <input type="text" id="price" class="form-control" placeholder="price" name="price">
                                                
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="rating">ratings</label>
                                        <select class="form-control" id="rating" name="rating">
                                            <option disabled selected>Select ratings</option>
                                            <option value="★☆☆☆☆">1 star</option>
                                            <option value="★★☆☆☆">2 star</option>
                                            <option value="★★★☆☆">3 star</option>
                                            <option value="★★★★☆">4 star</option>
                                            <option value="★★★★★">5 star</option>
                                        </select>
                                    </div>
                                </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <div class="custom-file">
                                              <input type="file" class="custom-file-input" id="image" name="image">
                                            </div>
                                          </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>





@endsection