@extends('admin.dashboard')
@section('body_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 rounded-lg">
                <div class="card-header"><h5 class="text-center font-weight-light ">Add Bill</h5></div>
                 @if(Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
                <div class="card-body">
                    <form action="{{route('admin.addBill')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example" id="select_officer" name="user_id" required>
                              <option selected value="">Select Officer</option>
                              @foreach ($all_users as $user)
                              <option value="{{$user->id}}">{{$user->bup_id}}({{$user->name}}) ({{$user->department_id}})</option>
                              @endforeach
                            <!--   <option value="1">12006(Mazharul Islam Tuhin) (ICT Centre)</option>
                              <option value="2">121007(Kawser Hossen) (ICT Centre)</option>
                              <option value="3">12103(Md  -->Shohel Rana) (ICT Centre)</option>
                            </select>
                        </div>
                         <div class="form-floating mb-3">
                                <input class="form-control datepicker" id="bill_date" name="bill_date" type="text" placeholder="Date" autocomplete="off"  required />
                                <label for="inputDate">Date</label>
                        </div>
                       
                        <div class="row">
                            <div class="col-lg-6">
                               <div class="form-floating mb-3">
                                    <input class="form-control" id="breakfast" type="number" name="breakfast" placeholder="name@example.com"  />
                                    <label for="breakfast">Breakfast</label>
                                </div>
                            </div>
                             <div class="col-lg-6">
                               <div class="form-floating mb-3">
                                    <input class="form-control" id="tea_break" type="number" name="tea_break" placeholder="tea break" />
                                    <label for="tea_break">Tea Break</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="lunch" type="number" name="lunch" placeholder="lunch" />
                                    <label for="lunch">Lunch</label>
                                </div>
                            </div>
                             <div class="col-lg-6">
                               <div class="form-floating mb-3">
                                    <input class="form-control" id="other" type="number" name="other" placeholder="tea break" />
                                    <label for="other">Other</label>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-0 mb-0">
                            <button class="btn btn-primary py-3 px-5" type="submit" >Add Bill</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection