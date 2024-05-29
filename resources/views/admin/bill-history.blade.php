@extends('admin.dashboard')
@section('body_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 rounded-lg">
                <div class="card-header"><h5 class="text-center font-weight-light ">Bill History</h5></div>
                 @if(Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
                <div class="card-body">
                    <form action="{{route('admin.billHistory')}}" method="GET">
                        @csrf
                        <div class="row">
                            <div class="col-lg-10">
                                 <div class="mb-3">
                                    <select class="form-select" aria-label="Default select example" id="select_officer" name="user_id" required>
                                      <option selected value="">Select Officer</option>
                                       @foreach ($all_users as $all_user)
                                      <option value="{{$all_user->id}}">{{$all_user->bup_id}}({{$all_user->name}}) ({{$all_user->department_id}})</option>
                                      @endforeach
                                      <!-- <option value="1">12006(Mazharul Islam Tuhin) (ICT Centre)</option>
                                      <option value="2">121007(Kawser Hossen) (ICT Centre)</option>
                                      <option value="3">12103(Md Shohel Rana) (ICT Centre)</option> -->
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
    @if ($user_bills)
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
              <th scope="col">Other</th>
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
                    $grand_total+=$user_bill->breakfast+$user_bill->tea_break+$user_bill->lunch+$user_bill->other;
                @endphp
             <tr>
              <!-- <th scope="row">1</th> -->
              <td>{{$user_bill->bill_date}}</td>
              <td>{{$user_bill->breakfast}}</td>
              <td>{{$user_bill->tea_break}}</td>
              <td>{{$user_bill->lunch}}</td>
              <td>{{$user_bill->other}}</td>
              <td>{{$user_bill->breakfast+$user_bill->tea_break+$user_bill->lunch+$user_bill->other}}</td>
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
                <th scope="row" colspan="5" class="">Grand Total</th>
                <td colspan="" ><span style="font-weight:bold;"> {{$grand_total}}</span></td>
            </tr>
            
          </tbody>
        </table>
    </div>
    @endif
</div>
@endsection