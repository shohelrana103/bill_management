@extends('admin.dashboard')
@section('body_content')
<div class="container">
    <div class="row mx-4 mt-2">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">BUP No.</th>
              <th scope="col">Name</th>
              <th scope="col">Total Due</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
             <tr>
              <td>{{Auth::user()->bup_id}}</td>
              <td>{{Auth::user()->name}}</td>
              <td>{{$user_due}}</td>
              <td><a class="btn btn-warning">Pay Now</a></td>
            </tr>
          </tbody>
        </table>
    </div>
</div>
@endsection