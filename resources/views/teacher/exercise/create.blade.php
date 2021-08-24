
<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form id="form_create" data-url="" method="POST" role="form" action="">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm Bài Tập</h5>
            </div>
                <div class="modal-body">
                    @csrf
                    <div class="card-content">
                        <input type="hidden" id="title" value="0">
                        <input type="hidden" name="grade" id="grade" value="{{ $id }}">
                        <input type="hidden" class="form-control datetimepicker" value="" id="postingTime"  name="postingTime"/>
                        <script>
                            var today = new Date();
                            var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
                            var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                            var dateTime = date+' '+time;
                            $("#postingTime").val(dateTime);
                        </script>
                        <div class="form-group label-floating">
                            <div class="form-group">
                                <label class="label-control">Gia Hạn Nộp</label>
                                <input type="text" class="form-control datetimepicker" value="" id="deadlineSubmission" name="deadlineSubmission"/>
                            </div>
                        </div>
                        <div class="form-group label-floating">
                            <div class="form-group">
                                <label class="label-control">Đề Bài</label>
                                <input type="text" class="form-control" value="" id="question" name="question"/>
                            </div>
                        </div>
                        <div class="form-group label-floating">
                            <label class="label-control">Nội Dung</label>
                            <textarea class="form-control" rows="10" id="content" name="content"></textarea>
                            <script>
                                    CKEDITOR.replace( 'content' );
                            </script>
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

        var url = $('#form_create').attr('data-url');
        var title = $('#title').val();
        var grade = $("#grade").val();
        var postingTime = $("#postingTime").val();
        var deadlineSubmission = $("#deadlineSubmission").val();
        var question = $("#question").val();
        var content = CKEDITOR.instances['content'].getData();
        if (postingTime == "" || deadlineSubmission == "" || question == "" || content =="" ) {
            alert("điền đầy đủ thông tin")
        } else {
            $.ajax({
                url: "{{ Route("exercise.store") }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    title:title,
                    grade:grade,
                    postingTime:postingTime,
                    deadlineSubmission:deadlineSubmission,
                    question:question,
                    content:content,
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