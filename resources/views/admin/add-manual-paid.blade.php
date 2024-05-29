@extends('admin.dashboard')
@section('body_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 rounded-lg">
                <div class="card-header"><h5 class="text-center font-weight-light ">Add Manual Paid</h5></div>
                 @if(Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
                <div class="card-body">
                    <form action="{{route('admin.addManualPaidPost')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example" id="select_officer" name="user_id" required>
                              <option selected value="">Select Officer</option>
                              @foreach ($all_users as $user)
                              <option value="{{$user->id}}">{{$user->bup_id}}({{$user->name}}) ({{$user->department_id}})</option>
                              @endforeach
                              </option>
                            </select>
                        </div>
                         <div class="form-floating mb-3">
                                <input class="form-control datepicker" id="paid_date" name="paid_date" type="text" placeholder="Date" autocomplete="off"  required />
                                <label for="inputDate">Date</label>
                        </div>
                       
                        <div class="row">
                            <div class="col-lg-6">
                               <div class="form-floating mb-3">
                                    <input class="form-control" id="paid_amount" type="number" name="paid_amount" placeholder="name@example.com" required />
                                    <label for="paid_amount">Amount</label>
                                </div>
                            </div>
                             <div class="col-lg-6">
                               <div class="form-floating mb-3">
                                    <input class="form-control" id="comment" type="text" name="comment" placeholder="tea break" />
                                    <label for="comment">Comment</label>
                                </div>
                            </div>
                        </div>
                       
                        <div class="d-flex align-items-center justify-content-between mt-0 mb-0">
                            <button class="btn btn-primary py-3 px-5" type="submit" >Add Paid Amount</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection