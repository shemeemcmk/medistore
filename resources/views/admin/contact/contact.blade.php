@extends('admin.layout.header')
@section('content')

<div class="main-content container-fluid">
<div class="row" id="basic-table">
    <div class="col-12 col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Table enquyeries</h4>
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
                    <th>email</th>
                    <th>subject</th>
                    <th>messege</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($contact as $key=> $a)
                  <tr>
                    <td>{{$a->id}}</td>
                    <td>{{$a->name}}</td>
                    <td>{{$a->email}}</td>
                    <td>{{$a->subject}}</td>
                    <td>{{$a->messege}}</td>
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