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
                            <form action="{{route('add-product')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <input type="hidden" name="products_id" value="{{$products->id}}">
                                            <label for="first-name-column"> Name</label>
                                            <input type="text" id="first-name-column" class="form-control" placeholder="First Name" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">price</label>
                                            <input type="text" id="last-name-column" class="form-control" placeholder="price" name="price">
                                                
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1"></label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="catogory">
                                                <option disabled selected>Select Category</option>
                                                @foreach($category as $item)
                                                <option value="{{ $item->id }}">{{ $item->catagorie_name }}</option>
                                                @endforeach
                                            </select>
                                          </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="rating"></label>
                                        <select class="form-control" id="rating" name="Rating">
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
                                              <input type="file" class="custom-file-input" id="customFile" name="image">
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