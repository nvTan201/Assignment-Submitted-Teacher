
<!-- Modal -->
<div class="modal fade" id="updateTeacher" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form id="form_update" data-url="" method="POST" role="form" action="">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm Bài Tập</h5>
            </div>
                <div class="modal-body">
                    @csrf
                    <div class="card-content">
                        <div class="form-group label-floating">
                            <div class="form-group">
                                <label class="label-control">Tên</label>
                                <input type="text" class="form-control " value="" id="fistNameEdit" name="fistNameEdit"/>
                            </div>
                        </div>
                        <div class="form-group label-floating">
                            <div class="form-group">
                                <label class="label-control">Họ</label>
                                <input type="text" class="form-control " value="" id="lastNameEdit" name="lastNameEdit"/>
                            </div>
                        </div>
                        <div class="form-group label-floating">
                            <div class="form-group">
                                <label class="label-control">Email</label>
                                <input type="email" class="form-control " value="" id="emailEdit" name="emailEdit"/>
                            </div>
                        </div>
                        <div class="form-group label-floating">
                            <div class="form-group">
                                <label class="label-control">Password</label>
                                <input type="password" class="form-control" value="" id="passwordEdit" name="passwordEdit"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveUpdate">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $("#saveUpdate").click(function(e){
        
        e.preventDefault();

        var url = $('#form_update').attr('data-url');
        var fistName = $("#fistNameEdit").val();
        var lastName = $("#lastNameEdit").val();
        var email = $("#emailEdit").val();
        var password = $("#passwordEdit").val();
        if (fistName == "" ||lastName == "" ||email == "" || password =="" ) {
            alert("điền đầy đủ thông tin")
        } else {
            $.ajax({
                url: url,
                type: "PUT",
                data: {
                    _token: "{{ csrf_token() }}",
                    fistName:fistName,
                    lastName:lastName,
                    email:email,
                    password:password,
                },
                success: function (response) {

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Thêm Thành Công',
                        type: 'success',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    $('#createModal').modal('hide');

                    setTimeout(function(){
                        window.location.href='{{ Route("teacher.index") }}';
                    },500)
             
                }
            });
                   

        }
    });

</script>
