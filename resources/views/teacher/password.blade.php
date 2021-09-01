@extends('teacher/layout.app')
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">perm_identity</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">
                            Đổi Mật Khẩu
                        </h4>
                        <form method="POST">
                            <div class="row">
                                <div class="col-sm-2">

                                </div>
                                <div class="col-sm-7">
                                    <input type="hidden" id="password" value="{{ $teacher->passWordTeacher }}">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Mật Khẩu</label>
                                        <input type="password" class="form-control" id="pass" value="">
                                        <span id="err" style="color: red"></span>
                                    </div>
                                    <div class="form-group label-floating">
                                        <label class="control-label">nhập lại mật khẩU</label>
                                        <input type="password" class="form-control" id="cfpass" value="">
                                        <span id="errcf" style="color: red"></span>
                                    </div>
                                    <div class="form-group label-floating">
                                        <label class="control-label">mật khẩu mới</label>
                                        <input type="password" class="form-control" id="newpass" value="">
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
        var password = $("#password").val();
        var pass = $("#pass").val();
        var cfpass = $("#cfpass").val();
        var newpass = $("#newpass").val();
        var errcf = $("#errcf");
        var err = $("#err");

        if (pass==""|| cfpass==""|| newpass=="") {
            alert("Vui Lòng Nhập Đủ Thông Tin!");
        } else if (pass!= cfpass){
            err.html("");
            errcf.html("không khớp mật khẩu");
        } else if (pass != password){
            err.html("không khớp mật khẩu");
            errcf.html("");
        } else {
            
            $.ajax({
                url: "{{ Route("update-password") }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    newpass:newpass,
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
                        window.location.href='{{ Route("edit-password") }}';
                    },500)
             
                }
            });
        }
    });
</script>
@endsection