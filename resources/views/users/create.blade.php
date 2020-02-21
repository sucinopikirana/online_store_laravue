@extends('layouts.global')

@section('title')
Create User
@endsection

@section('pageTitle')
Create New User
@endsection

@section('content')
<div class="col-md-8">

    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif

    <form action="{{route('users.store')}}" method="post" class="bg-white shadow-lg p-5 m-10 custom-form" enctype="multipart/form-data">
        @csrf

        
        <h5 class="text-center m-3 custom-title-panel">USER INFORMATION</h5>

        <div class="user-information">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="firstname" class="custom-label">FIRSTNAME</label>
                    <input type="text" class="form-control" id="firstname" name="firstname">
                </div>

                <div class="form-group col-md-6">
                    <label for="lastname" class="custom-label">Lastname</label>
                    <input type="text" class="form-control" id="lastname" name="lastname">
                </div>
            </div>

            <div class="form-row">    
                <div class="form-group col-md-6">
                    <label for="" class="custom-label">Roles</label>
                    
                    <br>

                    <div class="form-check form-check-inline">
                        <input type="checkbox" name="roles[]" id="ADMINISTRATOR" value="ADMINISTRATOR" class="checkbox-custom">
                        <label for="ADMINISTRATOR" class="label-custom-checkbox">Administrator</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input type="checkbox" name="roles[]" id="STAFF" value="STAFF" class="checkbox-custom">
                        <label for="STAFF" class="label-custom-checkbox ">Staff</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input type="checkbox" name="roles[]" id="CUSTOMER" value="CUSTOMER" class="checkbox-custom">
                        <label for="CUSTOMER" class="label-custom-checkbox">Customer</label>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="phone-number" class="custom-label">Phone Number</label>
                    <input type="text" name="phone" id="phone-number" class="form-control">
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="address" class="custom-label">Address</label>
                    <textarea rows="4" name="address" id="address" class="form-control"></textarea>
                </div>
            </div>

        </div>

        <h5 class="text-center m-3 custom-title-panel">USER DETAIL</h5>
        
        <div class="user-detail">

        </div>

    </form>
</div>
@endsection