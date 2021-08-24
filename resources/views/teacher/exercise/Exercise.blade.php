@extends('teacher/layout.app')
@section('content')

<div class="col-sm-6 col-lg-6">
    <a type="submit" class="btn btn-primary btn-round" href="{{ route('grade.index') }}">
        <i class="material-icons">
            chevron_left
        </i> 
            Lớp
    </a>
</div>
<div class="col-sm-10 col-lg-2 text-right">
    <div class="dropdown text-right">
        <button href="" class="dropdown-toggle btn btn-primary btn-round btn-block" data-toggle="dropdown" style="right: -360px;">Thêm Bài Tập
            <b class="caret"></b>       
        </button>
        <ul class="dropdown-menu dropdown-menu-right" style="right: -360px;">
            <li class="dropdown-header">Thêm Bài Tập</li>
            <li>
                <a href="" data-toggle="modal" data-target="#createModal">
                    <i class="material-icons">
                        add
                    </i> 
                        Tự Xoạn Bài Tập
                </a>
            </li>
            <li>
                <a href="" data-toggle="modal" data-target="#fileModal">
                    <i class="material-icons">
                        add
                    </i> 
                        Có File Sẵn
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        Bài Tập
                    </h2>
                </div>
                <div class="card-content">
                    <ul class="nav nav-pills nav-pills-warning">
                        <li class="active">
                            <a href="#pill1" data-toggle="tab">bài tập thường</a>
                        </li>
                        <li>
                            <a href="#pill2" data-toggle="tab">bài tập file</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="pill1">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="toolbar">
                                            <!--        Here you can write extra buttons/actions for the toolbar              -->   
                                        </div>
                                        <div class="material-datatables">
                                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Đề Bài</th>
                                                        <th>Ngày Đăng</th>
                                                        <th>Hạn Nộp</th>
                                                        {{-- <th>Lớp</th> --}}
                                                        {{-- <th>Người Đăng</th> --}}
                                                        {{-- <th></th> --}}
                                                        <th class="disabled-sorting text-right">Chức Năng</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Đề Bài</th>
                                                        <th>Ngày Đăng</th>
                                                        <th>Hạn Nộp</th>
                                                        {{-- <th>Lớp</th> --}}
                                                        {{-- <th>Người Đăng</th> --}}
                                                        {{-- <th></th> --}}
                                                        <th class="text-right">Chức Năng</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody> 
                                                        @php
                                                            $STT = 1;
                                                        @endphp
                                                    @foreach ($exercise as $result)
                                                        <tr>
                                                            <th>{{ $STT++ }}</th>
                                                            <th>{{ $result->question }}</th>
                                                            <th>{{ $result->postingTime }}</th>
                                                            <th>{{ $result->deadlineSubmission }}</th>
                                                            {{-- <th>{{ $result->nameGrade."k".$result->course}}</th> --}}
                                                            {{-- <th>{{ $result->fistNameTeacher." ".$result->lastNameTeacher }}</th> --}}
                                                            {{-- <th></th> --}}
                                                            <td class="text-right">
                                                                <form action="{{ route('exercise.show', $result->idExercise) }}" class="btn btn-simple btn-danger btn-icon">
                                                                    <input type="hidden" name="title" value="0">
                                                                    <button class="btn btn-simple btn-info btn-icon" rel="tooltip" data-placement="left" title="Chấm"><i class="material-icons">fact_check</i></button>
                                                                </form>
                                                                
                                                                <a data-url="{{ Route('exercise.edit',[$result->idExercise]) }}" class="btn btn-simple btn-warning btn-icon formUpdate" data-toggle="modal" data-target="#updateModal" rel="tooltip" data-placement="left" title="Sửa"><span class="material-icons">
                                                                border_color
                                                                </span></a>

                                                                <form data-url="{{ Route('exercise.destroy',[$result->idExercise]) }}" class="btn btn-simple btn-danger btn-icon deleteForm" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button" class="btn btn-simple btn-danger btn-icon btnDelete" rel="tooltip" data-placement="left" title="Xoá">
                                                                        <i class="material-icons" >close</i>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- end content-->
                                </div>
                                <!--  end card  -->
                            </div>
                            {{-- end col-md-12 --}}
                        </div>
                        <div class="tab-pane" id="pill2">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="toolbar">
                                            <!--        Here you can write extra buttons/actions for the toolbar              -->   
                                        </div>
                                        <div class="material-datatables">
                                            <table id="datatabless" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Đề Bài</th>
                                                        <th>Ngày Đăng</th>
                                                        <th>Hạn Nộp</th>
                                                        {{-- <th>Lớp</th> --}}
                                                        {{-- <th>Người Đăng</th> --}}
                                                        {{-- <th></th> --}}
                                                        <th class="disabled-sorting text-right">Chức Năng</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Đề Bài</th>
                                                        <th>Ngày Đăng</th>
                                                        <th>Hạn Nộp</th>
                                                        {{-- <th>Lớp</th> --}}
                                                        {{-- <th>Người Đăng</th> --}}
                                                        {{-- <th></th> --}}
                                                        <th class="text-right">Chức Năng</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody> 
                                                        @php
                                                            $STT = 1;
                                                        @endphp
                                                    @foreach ($exerciseFile as $result)
                                                        <tr>
                                                            <th>{{ $STT++ }}</th>
                                                            <th>{{ $result->question }}</th>
                                                            <th>{{ $result->postingTime }}</th>
                                                            <th>{{ $result->deadlineSubmission }}</th>
                                                            {{-- <th>{{ $result->nameGrade."k".$result->course}}</th> --}}
                                                            {{-- <th>{{ $result->fistNameTeacher." ".$result->lastNameTeacher }}</th> --}}
                                                            {{-- <th></th> --}}
                                                            <td class="text-right">
                                                                <form action="{{ route('exercise.show', $result->idExercise) }}" class="btn btn-simple btn-danger btn-icon">
                                                                    <input type="hidden" name="title" value="1">
                                                                    <button class="btn btn-simple btn-info btn-icon" rel="tooltip" data-placement="left" title="Chấm"><i class="material-icons">fact_check</i></button>
                                                                </form>
                                                                <a data-url="{{ Route('exercise.edit',[$result->idExercise]) }}" class="btn btn-simple btn-warning btn-icon formUpdate" data-toggle="modal" data-target="#updateModalFile" rel="tooltip" data-placement="left" title="Sửa"><span class="material-icons">
                                                                border_color
                                                                </span></a>
                                                                <form data-url="{{ Route('exercise.destroy',[$result->idExercise]) }}" class="btn btn-simple btn-danger btn-icon deleteForm" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button" class="btn btn-simple btn-danger btn-icon btnDelete" rel="tooltip" data-placement="left" title="Xoá">
                                                                        <i class="material-icons" >close</i>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- end content-->
                                </div>
                                <!--  end card  -->
                            </div>
                            {{-- end col-md-12 --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('modal')
@include('teacher/exercise.create')
@include('teacher/exercise.update') 
@include('teacher/exercise.createFile')
@include('teacher/exercise.updateFile')

{{-- delete --}}
<script type="text/javascript">
    $(".deleteForm").click(function(e){
        
        e.preventDefault();

        var url = $(this).attr('data-url');
        var token = $("input[name='_token']" ).val();
        if(confirm('bạn có chắc muốn xoá?')){
            $.ajax({
                url: url,
                type: "delete",
                data:{
                    _token:token
                },
                success: function (response) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Xoá Thành Công',
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

{{-- form-update --}}
<script type="text/javascript">
    $(".formUpdate").click(function(e){
        
        e.preventDefault();

        var url = $(this).attr('data-url');
        var token = $("input[name='_token']").val();

        $.ajax({
            url: url,
            type: "get",
            data:{
                _token:token
            },
            success: function (response) {  
                $(".deadlineSubmissionEdit").val(response.data.deadlineSubmission);
                $(".questionEdit").val(response.data.question);
                CKEDITOR.instances['contentEdit'].setData(response.data.content);
                var id = response.data.idExercise;  
                $(".update").attr('data-url','{{ asset("exercise/") }}/'+id);
            }
        });
        

    });

</script>
@endsection

