@extends('layouts.master')
@section('content')
<div class="container">

        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create User
                            <a href="{{url('users')}}" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-boady">
                        <form action="{{url('users/store')}}" method="POSt">
                            @csrf
                            <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                            <label for="">Password</label>
                            <input type="text" name="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Roles</label>
                                <select name="roles[]" class="form-control" multiple>
                                <option value="">--Select Roles--</option>
                                @foreach($roles as $role)
                                    <option value="{{$role}}">{{$role}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection