
<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form id="form_create" method="POST" role="form" action="">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm Bài Tập</h5>
            </div>
                <div class="modal-body">
                    @csrf
                    <div class="card-content">
                        <div class="form-group label-floating">
                            <div class="">
                                <select class="selectpicker" data-style="select-with-transition" title="Choose City" data-size="7" id="btnGrade">
                                    <option disabled selected value="0">Chọn Lớp</option>
                                    @foreach ($grade as $result)
                                        <option value="{{ $result->idGrade }}">{{ $result->nameGrade."k".$result->course}}</option>
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

<script type="text/javascript">
    $("#save").click(function(e){
        
        e.preventDefault();

        var grade = $("#btnGrade").val();
        if (grade==null) {
            alert("điền đầy đủ thông tin")
        } else {
            $.ajax({
                url: "{{ Route("grade.store") }}",
                type: "post",
                data: {
                    _token: "{{ csrf_token() }}",
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
                        window.location.href='{{ Route("grade.index") }}';
                    },500)
                }
            });
        }
    });

</script>