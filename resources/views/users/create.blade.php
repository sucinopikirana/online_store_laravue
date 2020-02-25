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

    <!-- Form Create User -->
    <form method="POST" action="" class="bg-white shadow-lg p-5 m-10 custom-form" id="create-user">
        <div class="form-row">
            <div class="form-group col-md-12 text-center">
                <label for="avatar" class="custom-label" style="font-weight: bold;">Choose Avatar Image</label>

                <div class="avatar-upload">
                    <div class="avatar-edit">
                        <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                        <label for="imageUpload"></label>
                    </div>
                    <div class="avatar-preview">
                        <div id="imagePreview" style="background-image: url({{asset('img/profile-picture.jpg')}});">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Panel User Information -->
        <h5 class="text-center m-3 custom-title-panel">USER INFORMATION</h5>

        <div class="user-information">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="firstname" class="custom-label">Firstname</label>
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
                        <input type="checkbox" name="roles" id="ADMINISTRATOR" value="ADMINISTRATOR" class="checkbox-custom">
                        <label for="ADMINISTRATOR" class="label-custom-checkbox">Administrator</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input type="checkbox" name="roles" id="STAFF" value="STAFF" class="checkbox-custom">
                        <label for="STAFF" class="label-custom-checkbox ">Staff</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input type="checkbox" name="roles" id="CUSTOMER" value="CUSTOMER" class="checkbox-custom">
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

        <!-- End Panel User Information -->

        <!-- Panel User Detail -->
        <h5 class="text-center m-3 custom-title-panel">USER DETAIL</h5>
        
        <div class="user-detail">

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="email" class="custom-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="password" class="custom-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label for="password-confirmation" class="custom-label">Password Confirmation</label>
                    <input type="password" name="password-confirmation" id="password-confirmation" class="form-control">
                    <div class="invalid-feedback"></div>
                </div>
            </div>

        </div>
        <!-- End Panel User Detail -->

        {{-- Submit --}}

        <div class="form-row">
            {{-- <button class="btn btn-outline-blue btn-block custom-label-btn" id="save-user">Save</button> --}}
            <input type="button" value="Save" class="btn btn-outline-blue btn-block custom-label-btn" id="save-user">
        </div>
        

        {{-- End Submit --}}
    </form>
    <!-- End Form Create User -->
</div>

@endsection

@section('footerScript')
    $("#imageUpload").change(function() {
        readURL(this);
    });

    $("#save-user").click(() => {
        Swal.fire({
            title: `Are you sure?`,
            text: `You want to save data`,
            icon: `warning`,
            showCancelButton: true,
            confirmButtonColor: ``,
            cancelButtonColor: ``,
            confirmButtonText: `Yes, save it!`
        }).then((result)=>{
            if(result.value){

                const form = $('#create-user')[0]
                
                var fd = new FormData(form);
                const files = $('#imageUpload')[0].files[0];
                fd.append('avatar', files);

                let roles = [];
                const firstname = $('#firstname').val();
                const lastname = $('#lastname').val();

                const name =  firstname + " " + lastname;
                const username = firstname + lastname;

                $.each($("input:checkbox[name=roles]:checked"), function(){
                    roles.push($(this).val())
                });

                const phone = $('#phone-number').val();
                const address = $('#address').val();
                const email = $('#email').val();
                const password = $('#password-confirmation').val();

                fd.append('name', name)
                fd.append('username', username)
                fd.append('roles', roles)
                fd.append('phone', phone)
                fd.append('address', address)
                fd.append('password', password)
                fd.append('_token', "{{csrf_token()}}")

                $.ajax({
                    type: "POST",
                    enctype: 'multipart/form-data',
                    url: "{{route('users.store')}}",
                    data: fd,
                    processData: false,
                    contentType: false,
                    cache: false,
                    timeout: 800000,
                    success: function (data) {
                        console.log(data)

                        Swal.fire(
                            'Good job!',
                            'User Created!',
                            'success'
                        )
                    },
                    error: function (e) {
                        console.log("ERROR : ", e);
                    }
                })
            }
        })
    });

    $("#password-confirmation").keyup(() => {
        const newPassword = $(`#password-confirmation`).val()
        const oldPassword = $(`#password`).val()

        validate(oldPassword, newPassword)        
    })

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function validate(oldPassword, newPassword){
        if(oldPassword != newPassword){
            $(`#password-confirmation`).addClass('is-invalid')
            $(`#password-confirmation`).next()[0].innerHTML = 'Please enter the same value again'
            console.log()
        }
        else{
            $(`#password-confirmation`).removeClass('is-invalid')
        }
    }

@endsection

