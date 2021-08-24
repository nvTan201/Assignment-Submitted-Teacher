
<!-- Modal -->
<div class="modal fade" id="createClass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form id="form_create" data-url="" method="POST" role="form" action="">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm Bài Tập</h5>
            </div>
                <div class="modal-body">
                    @csrf
                    <div class="card-content">
                        <div class="form-group label-floating">
                            <div class="form-group">
                                <label class="label-control">Tên Lớp</label>
                                <input type="text" class="form-control " value="" id="nameClass" name="nameClass"/>
                            </div>
                        </div>
                        <div class="form-group label-floating">
                            <div class="form-group">
                                <label class="label-control">Khoá</label>
                                <input type="text" class="form-control" value="" id="course" name="course"/>
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

<script type="text/javascript">
    $("#save").click(function(e){
        
        e.preventDefault();

        var name = $("#nameClass").val();
        var course = $("#course").val();
        if (name == "" || course =="" ) {
            alert("điền đầy đủ thông tin")
        } else {
            $.ajax({
                url: "{{ Route("class.store") }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    name:name,
                    course:course,
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
                        window.location.href='{{ Route("class.index") }}';
                    },500)
             
                }
            });
                   

        }
    });

</script>
