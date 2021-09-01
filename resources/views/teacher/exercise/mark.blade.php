@extends('teacher/layout.app')

@section('content')
<div class="col-sm-6 col-lg-6">
    <a type="submit" class="btn btn-primary btn-round" href="{{ route('exercise.show', $finish->idExercise) }}">
        <i class="material-icons">
            chevron_left
        </i> 
            Bài Tập
    </a>
</div>
    <div class="row">   
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="card-content">
                    <h3 class="card-title">Chấm Bài -
                        <small class="category">{{ $finish->fistNameStudent." ".$finish->lastNameStudent }}</small>
                    </h3>
                    <form>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Bài Làm</label>
                                    <div class="form-group label-floating">
                                        <textarea class="form-control" id="content" rows="15" disabled>{!! $finish->exerciseFinish !!}</textarea>
                                        <script>
                                            CKEDITOR.replace( 'content' );
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>  
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-profile">
                <div class="card-content">
                    <form data-url="{{ route('updateFinish', $finish->idExerciseFinish) }}" id="form_update">
                        <div class="form-group">
                            <div class="form-group label-floating">
                                <label>Lời Phê</label>
                                <textarea class="form-control" rows="10" id="note" placeholder="lời Phê">{{ $finish->note }}</textarea>
                            </div>
                            
                            <div class="form-group label-floating">
                                <label>Điểm</label>
                                <input type="number" max="10" min="0" class="form-control" placeholder="Điểm" id="mark" value="{{ $finish->mark }}">
                            </div>

                            <button type="button" class="btn btn-primary save" id="save">Save</button>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>  
@endsection
@section('modal')
    <script>
        $('#save').click(function (e) { 
            e.preventDefault();
            
            var mark = $('#mark').val();
            var note = $("#note").val();
            var url = $("#form_update").attr('data-url');

            if (mark >= 11 || mark < 0 || mark =="") {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Xin Nhập lại Điểm',
                    type: 'error',
                    showConfirmButton: false,
                    timer: 1500
                })
            } else {
                $.ajax({
                    url: url,
                    type: "post",
                    data: {
                        mark:mark,
                        note:note,
                        _token: "{{ csrf_token() }}",
                    },
                    success: function (response) {
                        Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Chấm Thành Công',
                                type: 'success',
                                showConfirmButton: false,
                                timer: 1500
                        })

                        $('#createModal').modal('hide');

                        setTimeout(function(){
                            window.location.href='{{ Route("exercise.show", "$finish->idExercise") }}';
                        },500)
                    }
                });
            }
        });
    </script>
@endsection
