
<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form id="form_update" class="update" method="POST" role="form" >
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sửa Bài Tập</h5>
            </div>
                <div class="modal-body">
                    @csrf
                    <div class="card-content">
                        <div class="form-group label-floating">
                            <div class="form-group">
                                <label class="label-control">Gia Hạn Nộp</label>
                                <input type="text" class="form-control datetimepicker deadlineSubmissionEdit" value="" id="deadlineSubmissionEdit" name="deadlineSubmission"/>
                            </div>
                        </div>
                        <div class="form-group label-floating">
                            <label class="label-control">Đề Bài</label>
                            <input type="text" class="form-control questionEdit" value="" id="questionEdit" name="question"/>
                        </div>
                        <div class="form-group label-floating">
                            <label class="label-control">Nội Dung</label>
                            <textarea class="form-control" rows="10" id="contentEdit" name="content"></textarea>
                            <script>
                                    CKEDITOR.replace( 'contentEdit' );
                            </script>
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

        var url = $("#form_update").attr('data-url');
        var grade = {{ $id }};
        var deadlineSubmission = $("#deadlineSubmissionEdit").val();
        var question = $("#questionEdit").val();
        var check = "0";
        var content = CKEDITOR.instances['contentEdit'].getData();
        if (postingTime == "" || deadlineSubmission == "" || question == "" || content == "") {
            alert("điền đầy đủ thông tin")
        } else {
            $.ajax({
                url: url,
                type: "PUT",
                data: {
                    _token: "{{ csrf_token() }}",
                    grade:grade,
                    deadlineSubmission:deadlineSubmission,
                    question:question,
                    content:content,
                    check:check,
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
                        window.location.href='{{ Route("grade.show","$id") }}';
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