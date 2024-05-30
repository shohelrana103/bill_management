@extends('admin.dashboard')
@section('body_content')
<div class="container">
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-2">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title float-left">Roles List</h4>
                    <p class="float-right mb-2">
                        <a class="btn btn-primary text-white" href="{{ route('admin.roles.create') }}">Create New Role</a>
                    </p>
                    <div class="clearfix"></div>
                    <div class="data-tables">
                         @include('admin.partials.messages')
                        <table id="datatablesSimple" class="text-center">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th width="5%">Sl</th>
                                    <th width="10%">Name</th>
                                    <th width="60%">Permissions</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($roles as $role)
                               <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @foreach ($role->permissions as $perm)
                                            <span style="font-weight:bold;" class="font-weight-bold  mr-1">
                                                {{ $perm->name }}, 
                                            </span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a class="btn btn-success text-white" href="{{ route('admin.roles.edit', $role->id) }}">Edit</a>

                                        <a class="btn btn-danger text-white" href="{{ route('admin.roles.destroy', $role->id) }}"
                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $role->id }}').submit();">
                                            Delete
                                        </a>

                                        <form id="delete-form-{{ $role->id }}" action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- data table end -->
        
    </div>
</div>
@endsection