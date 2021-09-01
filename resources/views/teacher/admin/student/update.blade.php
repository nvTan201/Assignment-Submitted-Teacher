
<!-- Modal -->
<div class="modal fade" id="updateStudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <label class="label-control">tên</label>
                                <input type="text" class="form-control " value="" id="fistNameEdit" name="fistName"/>
                            </div>
                        </div>
                        <div class="form-group label-floating">
                            <div class="form-group">
                                <label class="label-control">họ</label>
                                <input type="text" class="form-control" value="" id="lastNameEdit" name="lastName"/>
                            </div>
                        </div>
                        <div class="form-group label-floating"> 
                            <div class="form-group">
                                <label class="label-control">ngay sinh</label>
                                <input type="text" class="form-control datetimepicker" value="" id="dateBirthEdit" name="dateBirth"/>
                            </div>
                        </div>
                        <div class="form-group label-floating">
                            <div class="form-group">
                                <label class="label-control">gioi tinh</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="gender" value="1" id="nam"> nam
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="gender" value="0" id="nu"> nu
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group label-floating">
                            <div class="form-group">
                                <label class="label-control">email</label>
                                <input type="email" class="form-control" value="" id="emailEdit" name="email"/>
                            </div>
                        </div>
                        <div class="form-group label-floating">
                            <div class="form-group">
                                <label class="label-control">pass</label>
                                <input type="password" class="form-control" value="" id="passEdit" name="pass"/>
                            </div>
                        </div>
                        <div class="form-group label-floating">
                            <div class="form-group">
                                <label class="label-control">lớp</label>
                                <select class="selectpicker" data-style="select-with-transition" title="Chọn Lớp" data-size="7" id="classEdit" name="classEdit">
                                    <option disabled>Chọn Lớp</option>
                                    @foreach ($class as $result)
                                        <option value="{{ $result->idGrade }}">
                                            {{ $result->nameGrade."k".$result->course }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="update">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $("#update").click(function(e){
        
        e.preventDefault();

        var url = $('#form_update').attr('data-url');
        var name = $("#nameClassUpdate").val();
        var course = $("#courseUpdate").val();
        if (name == "" || course =="" ) {
            alert("điền đầy đủ thông tin")
        } else {
            $.ajax({
                url: url,
                type: "PUT",
                data: {
                    _token: "{{ csrf_token() }}",
                    name:name,
                    course:course,
                },
                success: function (response) {

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Sửa Thành Công',
                        type: 'success',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    $('#createModal').modal('hide');

                    setTimeout(function(){
                        window.location.href='{{ Route("studentAdmin.index") }}';
                    },500)
             
                }
            });
                   

        }
    });

</script>
