
<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form id="form_create" method="POST" action="{{ route('addByExcel.teacher-add-excel') }}" enctype="multipart/form-data">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm Bài Tập</h5>
            </div>
                <div class="modal-body">
                    @csrf
                    <div class="card-content">
                        <div class="form-group label-floating">
                            <div class="form-group">
                                <label class="label-control">Tải file về rồi điền</label><br>
                                <a href="{{ asset("upload/mauExcelTeacher.xlsx") }}" download> <span class="material-icons">file_download</span></a>
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
                <button type="submit" class="btn btn-primary" id="save">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

