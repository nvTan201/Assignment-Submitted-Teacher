
<!-- Modal -->
<div class="modal fade" id="createStudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form id="form_create" method="POST" role="form" action="">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm Học Sinh</h5>
            </div>
                <div class="modal-body">
                    @csrf
                    <div class="card-content">
                        <div class="form-group label-floating">
                            <div class="form-group">
                                <label class="label-control">tên</label>
                                <input type="text" class="form-control " value="" id="fistName" name="fistName"/>
                            </div>
                        </div>
                        <div class="form-group label-floating">
                            <div class="form-group">
                                <label class="label-control">họ</label>
                                <input type="text" class="form-control" value="" id="lastName" name="lastName"/>
                            </div>
                        </div>
                        <div class="form-group label-floating"> 
                            <div class="form-group">
                                <label class="label-control">ngay sinh</label>
                                <input type="text" class="form-control datetimepicker" value="" id="dateBirth" name="dateBirth"/>
                            </div>
                        </div>
                        <div class="form-group label-floating">
                            <div class="form-group">
                                <label class="label-control">gioi tinh</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="gender" value="1"> nam
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="gender" value="0"> nu
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group label-floating">
                            <div class="form-group">
                                <label class="label-control">email</label>
                                <input type="email" class="form-control" value="" id="email" name="email"/>
                            </div>
                        </div>
                        <div class="form-group label-floating">
                            <div class="form-group">
                                <label class="label-control">pass</label>
                                <input type="password" class="form-control" value="" id="pass" name="pass"/>
                            </div>
                        </div>
                        <div class="form-group label-floating">
                            <div class="form-group">
                                <label class="label-control">lớp</label>
                                <select class="selectpicker" data-style="select-with-transition" title="Chọn Lớp" data-size="7" id="class">
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
                <button type="button" class="btn btn-primary" id="save">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- create --}}
<script type="text/javascript">

    $("#save").click(function (e) { 

        e.preventDefault();
        
        
        var fistName = $("#fistName").val();
        var lastName = $("#lastName").val();
        var dateBirth = $("#dateBirth").val();
        var gender = "";
        var selected = $("input[type='radio'][name='gender']:checked");
        if (selected.length > 0) {
            gender = selected.val();
        }
        var email = $("#email").val();
        var pass = $("#pass").val();
        var grade = $("#class").val();

        if (fistName == "" || lastName =="" || dateBirth ==""|| gender ==""|| email ==""|| pass ==""|| grade =="") {
            alert("điền đầy đủ thông tin")
        } else {
            $.ajax({
                url: "{{ Route("student.store") }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    fistName:fistName,
                    lastName:lastName,
                    dateBirth:dateBirth,
                    gender:gender,
                    email:email,
                    pass:pass,
                    grade:grade,
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
                        window.location.href='{{ Route("student.index") }}';
                    },500)
             
                }
            });
                   

        }
    });

</script>
<script type="text/javascript">
    $('.datetimepicker').datetimepicker({
        format: 'YYYY/MM/DD HH:mm:ss',
        icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-chevron-up",
            down: "fa fa-chevron-down",
            previous: 'fa fa-chevron-left',
            next: 'fa fa-chevron-right',
            today: 'fa fa-screenshot',
            clear: 'fa fa-trash',
            close: 'fa fa-remove'
        }
    });
</script>