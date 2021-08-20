
<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form id="form_create" method="POST" action="{{ route('addByExcel.class-add-excel') }}" enctype="multipart/form-data">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm Bài Tập</h5>
            </div>
                <div class="modal-body">
                    @csrf
                    <div class="card-content">
                        <div class="form-group label-floating">
                            <div class="form-group">
                                <label class="label-control">Tải file về rồi điền</label><br>
                                <a href="{{ asset("upload/mauExcelClass.xlsx") }}" download> <span class="material-icons">file_download</span></a>
                            </div>
                        </div>
                        <div>
                                <label class="label-control">Chọn File Excel</label>
                                <input type="file" value="" id="file" name="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- <script type="text/javascript">
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

</script> --}}
