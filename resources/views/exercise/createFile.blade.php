
<!-- Modal -->
<div class="modal fade" id="fileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form id="form_create_file" data-url="{{ Route("exercise.store") }}" method="POST" role="form" action="" enctype="multipart/form-data">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm Bài Tập</h5>
            </div>
                <div class="modal-body">
                    @csrf
                    <div class="card-content">
                        <input type="hidden" id="titleFile" name="title" value="1">
                        <input type="hidden" name="grade" id="gradeFile" value="{{ $id }}">
                        <input type="hidden" class="form-control datetimepicker" value="" id="postingTimeFile"  name="postingTime"/>
                        <script>
                            var today = new Date();
                            var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
                            var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                            var dateTime = date+' '+time;
                            $("#postingTimeFile").val(dateTime);
                        </script>
                        <div class="form-group label-floating">
                            <div class="form-group">
                                <label class="label-control">Gia Hạn Nộp</label>
                                <input type="text" class="form-control datetimepicker" value="" id="deadlineSubmissionFile" name="deadlineSubmission"/>
                            </div>
                        </div>
                        <div class="form-group label-floating">
                            <div class="form-group">
                                <label class="label-control">Đề Bài</label>
                                <input type="text" class="form-control" value="" id="questionFile" name="question"/>
                            </div>
                        </div class="form-group label-floating">
                        <div>
                            <input type="file" name="file" id="file" />
                        </div>  
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="savefile">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- <script type="text/javascript">
        $("#savefile").click(function(e){
            
            e.preventDefault(); 

            var url = $('#form_create_file').attr('data-url');
            var title = $('#title').val();
            var grade = $("#gradeFile").val();
            var postingTime = $("#postingTimeFile").val();
            var deadlineSubmission = $("#deadlineSubmissionFile").val();
            var question = $("#questionFile").val();
            var file = $("#file")[0].files;
            alert(file[0]);

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
                        content:file,
                    },
                    success: function (response) {

                        // Swal.fire({
                        //     position: 'top-end',
                        //     icon: 'success',
                        //     title: 'Thêm Thành Công',
                        //     type: 'success',
                        //     showConfirmButton: false,
                        //     timer: 1500
                        // })

                    alert(response.data);

                        $('#createModal').modal('hide');

                        // setTimeout(function(){
                        //     window.location.href='{{ Route("grade.show","$id") }}';
                        // },500)
                
                    }
                });
                    
                    
            }
        });
</script> --}}
<script>
    $(document).ready(function (e) {
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
    
    $('#file').change(function(){
        
        let reader = new FileReader();

        reader.readAsDataURL(this.files[0]); 
    
    });
    
    $('#form_create_file').submit(function(e) {

        e.preventDefault();
    
        var formData = new FormData(this);
        

        $.ajax({
            type:'POST',
            url: "{{ Route("exercise.store") }}",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {

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
                
            },
            error: function(data){
            console.log(data);
            }
        });
    });
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