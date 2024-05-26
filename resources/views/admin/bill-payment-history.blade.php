@extends('admin.dashboard')
@section('body_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 rounded-lg">
                <div class="card-header"><h5 class="text-center font-weight-light ">Bill Pay Status</h5></div>
                 @if(Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
                <div class="card-body">
                    <form action="{{route('admin.billPayment')}}" method="GET">
                        @csrf
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="form-floating mb-3">
                                <input class="form-control datepicker" id="bill_date" name="bill_date" type="text" placeholder="Date" autocomplete="off"  required />
                                <label for="inputDate">Start Date</label>
                            </div>
                            </div>
                             <div class="col-lg-5">
                                <div class="form-floating mb-3">
                                <input class="form-control datepicker" id="bill_end_date" name="bill_date" type="text" placeholder="Date" autocomplete="off"  required />
                                <label for="inputDate">End Date</label>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                  <div class="d-flex align-items-center justify-content-between mt-0 mb-0">
                            <button class="btn btn-primary py-3 px-4" type="submit" >GET</button>
                        </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
     @if ($bill_status)
    <div class="row mx-4 mt-2">
        <div class="col-lg-5">
              <table class="table">
            <tr>
                <th scope="row">BUP No.</th>
                <td class="align-items-left">{{$user->bup_id}}</td>
                <th scope="row">Name: </th>
                <td >{{$user->name}}</td>
            </tr>
        </table>
        </div>
        <table class="table table-bordered">
          <thead>
            <tr>
              <!-- <th scope="col">#</th> -->
              <th scope="col">Date</th>
              <th scope="col">Breakfast</th>
              <th scope="col">T-Break</th>
              <th scope="col">Lunch</th>
              <th scope="col">Total</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @php
                $grand_total = 0;
            @endphp
            @foreach($user_bills as $user_bill)
                @php
                    $grand_total+=$user_bill->breakfast+$user_bill->tea_break+$user_bill->lunch;
                @endphp
             <tr>
              <!-- <th scope="row">1</th> -->
              <td>{{$user_bill->bill_date}}</td>
              <td>{{$user_bill->breakfast}}</td>
              <td>{{$user_bill->tea_break}}</td>
              <td>{{$user_bill->lunch}}</td>
              <td>{{$user_bill->breakfast+$user_bill->tea_break+$user_bill->lunch}}</td>
              <td><a class="btn btn-warning">Edit</a> <a class="btn btn-danger">Delete</a></td>
            </tr>
            @endforeach
            <!-- <tr>
              <th scope="row">1</th>
              <td>25-04-2024</td>
              <td>20</td>
              <td>30</td>
              <td>0</td>
              <td>50</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>26-04-2024</td>
              <td>0</td>
              <td>10</td>
              <td>0</td>
              <td>10</td>
            </tr> -->
            <tr>
                <th scope="row" colspan="4" class="">Total</th>
                <td colspan="">{{$grand_total}}</td>
            </tr>
            
          </tbody>
        </table>
    </div>
    @endif
</div>
@endsection