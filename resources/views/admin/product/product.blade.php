@extends('admin.layout.header')
@section('content')

<div class="main-content container-fluid">
<div class="row" id="basic-table">
    <div class="col-12 col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Table product</h4>
        </div>
        <div>
            <a href="{{route('product-addform')}}">
                <button type="submit" class="btn btn-success">add more</button></a>
        </div>
        <div class="card-content">
          <div class="card-body">
            <!-- Table with outer spacing -->
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>NAME</th>
                    <th>price</th>
                    <th>category</th>
                    <th>image</th>
                    <th>rating</th>
                    <th>action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($products as $key=> $a)
                  <tr>
                    <td>{{$a->id}}</td>
                    <td>{{$a->name}}</td>
                    <td>{{$a->price}}</td>
                    <td>{{$a->catogory}}</td>
                    <td><img src="{{asset($a->image)}}" style="border-radius:50%; width: 33px; height: 33px;" alt="" class="circle responsive-img"></td>
                    <td>{{$a->Rating}}</td>
                    <td><a href="{{route('product-editform',$a->id)}}" class="text-warning font-weight-bold text-xs" style="font-size: 18px;" data-toggle="tooltip" data-original-title="Edit user">
                      <i class="fa fa-edit">edit</i>
                  </a>
                  <a href="{{route('delete-product',$a->id)}}" class="text-danger font-weight-bold text-xs " style="font-size: 18px; margin-left: 20px;" data-toggle="tooltip" data-original-title="Edit user">
                      <i class="fa fa-trash">delete</i>
                  </a>
                  </td>
                  </tr>
                </tbody>
                @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>








@endsection