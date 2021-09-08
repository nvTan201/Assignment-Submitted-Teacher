@extends('teacher/layout.app')
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">perm_identity</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">
                            Chỉnh Sửa Thông Tin Cá Nhân
                        </h4>
                        <form action="{{ route('updateAccount')}}" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Fist Name</label>
                                        <input type="text" class="form-control" id="fistName" value="{{ $teacher->fistNameTeacher }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Last Name</label>
                                        <input type="text" class="form-control" id="lastName" value="{{ $teacher->lastNameTeacher }}">  
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Email</label>
                                        <input type="email" class="form-control" readonly id="email" value="{{ $teacher->emailTeacher }}">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-rose pull-right" id="save">Save</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('modal')
<script>
    $("#save").click(function (e) { 
        e.preventDefault();
        var fistName = $("#fistName").val();
        var lastName = $("#lastName").val();
        var email = $("#email").val();
        var confirmPass = $("#confirmPass").val();
        if (fistName==""|| lastName==""|| email=="") {
            alert("Vui Lòng Nhập Đủ Thông Tin!");
        } else {
            
            $.ajax({
                url: "{{ Route("updateAccount") }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    fistName:fistName,
                    lastName:lastName,
                    email:email,
                },
                success: function (response) {

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Thành Công',
                        type: 'success',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    setTimeout(function(){
                        window.location.href='{{ Route("account") }}';
                    },500)
             
                }
            });
        }
    });
</script>
@endsection