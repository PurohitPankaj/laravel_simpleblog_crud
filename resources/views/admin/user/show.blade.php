@extends('layouts.app')

@section('content')
@include('includes.errors')
<!-- Main content -->
<div class="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">View User</h3>
                            <a href="{{ route('admin.index') }}" class="btn btn-primary">Go Back to Post List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-pimary">
                            <tbody>
                                <tr>
                                    <th style="width: 200px">Author Name</th>
                                    <td>{{ $user->name.' '.$user->last_name }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 200px">Email</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 200px">Mobile</th>
                                    <td>{{ $user->mobile }}</td>
                                </tr>                        
                                <tr>
                                    <th style="width: 200px">Role</th>
                                    <td>{{ ($user->role_as) ? 'Admin' : 'User'}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection