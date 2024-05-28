@extends('admin.dashboard')
@section('body_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 rounded-lg">
                <div class="card-header"><h5 class="text-center font-weight-light ">Payment History</h5></div>
                 @if(Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
                <div class="card-body">
                    <form action="{{route('admin.paymentHistory')}}" method="GET">
                        @csrf
                        <div class="row">
                            <div class="col-lg-10">
                                 <div class="mb-3">
                                    <select class="form-select" aria-label="Default select example" id="select_officer" name="user_id" required>
                                      <option selected value="">Select Officer</option>
                                       @foreach ($all_users as $user)
                                      <option value="{{$user->id}}">{{$user->bup_id}}({{$user->name}}) ({{$user->department_id}})</option>
                                      @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                 <div class="d-flex align-items-center justify-content-between mt-0 mb-0">
                                    <button class="btn btn-primary py-2 px-3" type="submit" >Get</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if ($total_bill)
    <div class="row mx-4 mt-2">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">BUP No</th>
              <th scope="col">Name</th>
              <th scope="col">Total Bill</th>
              <th scope="col">Total Paid</th>
              <th scope="col">Due</th>
            </tr>
          </thead>
          <tbody>
             <tr>
              <td>{{$user->bup_id}}</td>
              <td>{{$user->name}}</td>
              <td>{{$total_bill}}</td>
              <td>{{$total_paid}}</td>
              <td>{{$total_bill-$total_paid}}</td>
            </tr>
          </tbody>
        </table>
    </div>
    @endif
</div>
@endsection