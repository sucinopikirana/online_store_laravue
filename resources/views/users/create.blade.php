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

    <form action="{{route('users.store')}}" method="post" class="bg-white shadow-sm p-3" enctype="multipart/form-data">
        @csrf

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="firstname">Firstname</label>
                <input type="text" class="form-control" id="firstname" placeholder="Firstname" name="firstname">
            </div>

            <div class="form-group col-md-6">
                <label for="lastname">Lastname</label>
                <input type="text" class="form-control" id="lastname" placeholder="Lastname" name="lastname">
            </div>
        </div>

        <label for="">Roles</label>

        <div class="form-row">    
            <div class="form-group col-md-6">

                <input type="checkbox" name="roles[]" id="ADMINISTRATOR" value="ADMINISTRATOR">
                <label for="ADMINISTRATOR">Administrator</label>
                
                <input type="checkbox" name="roles[]" id="STAFF" value="STAFF">
                <label for="STAFF">Staff</label>

                <input type="checkbox" name="roles[]" id="CUSTOMER" value="CUSTOMER">
                <label for="CUSTOMER">Customer</label>

                
            </div>
        </div>
        

    </form>
</div>
@endsection