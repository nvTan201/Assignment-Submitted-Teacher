
<!-- Modal -->
<div class="modal fade" id="updateModalFile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form action="{{ route('exercise.update', $result->idExercise) }}" id="form_update_file" class="update" method="POST" role="form" action="" enctype="multipart/form-data">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sửa Bài Tập</h5>
            </div>
                <div class="modal-body">
                    @method("PUT")
                    @csrf
                    <input type="hidden" id="gradeFileUpdate" name="grade" value="{{ $id }}">
                    <input type="hidden" name="title" value="1">
                    <input type="hidden" name="check" id="check" value="1">
                    <div class="card-content">
                        <div class="form-group label-floating">
                            <div class="form-group">
                                <label class="label-control">Gia Hạn Nộp</label>
                                <input type="text" class="form-control datetimepicker deadlineSubmissionEdit" value="" id="deadlineSubmissionEditFile" name="deadlineSubmission"/>
                            </div>
                        </div>
                        <div class="form-group label-floating">
                            <label class="label-control">Đề Bài</label>
                            <input type="text" class="form-control questionEdit" value="" id="questionEditFile" name="question"/>
                        </div>
                        <div>
                            <input type="file" id="editFile" name="file">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="saveUpdateFile">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

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