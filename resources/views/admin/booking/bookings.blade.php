@extends('admin.layout.header')
@section('content')

<div class="main-content container-fluid">
<div class="row" id="basic-table">
    <div class="col-12 col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Table bookings</h4>
        </div>
        <div class="card-content">
          <div class="card-body">
            <!-- Table with outer spacing -->
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>F NAME</th>
                    <th>L name</th>
                    <th>email</th>
                    <th>country</th>
                    <th>state</th>
                    <th>pin</th>
                    <th>product_id</th>
                    <th>quantity</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($booking as $key=> $a)
                  <tr>
                    <td>{{$a->id}}</td>
                    <td>{{$a->firstname}}</td>
                    <td>{{$a->lastname}}</td>
                    <td>{{$a->email}}</td>
                    <td>{{$a->country}}</td>
                    <td>{{$a->state}}</td>
                    <td>{{$a->state}}</td>
                    <td>{{$a->product_id}}</td>
                    <td>{{$a->quantity}}</td>
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