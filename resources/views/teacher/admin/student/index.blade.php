@extends('teacher/layout.app')

@section('content')

    
<div class="col-sm-10 col-lg-2 text-right">
    <div class="dropdown text-right">
        <button href="" class="dropdown-toggle btn btn-primary btn-round btn-block" data-toggle="dropdown" style="left: 895px;">Thêm Sinh Viên
            <b class="caret"></b>       
        </button>
        <ul class="dropdown-menu dropdown-menu-right" style="left: 895px;">
            <li class="dropdown-header">Thêm Bài Tập</li>
            <li>
                <a href="" data-toggle="modal" data-target="#createStudent">
                    <i class="material-icons">
                        add
                    </i> 
                        Tự Thêm Tay
                </a>
            </li>
            <li>
                <a href="" data-toggle="modal" data-target="#add">
                    <i class="material-icons">
                        add
                    </i> 
                        Thêm Bằng Excel
                </a>
            </li>
        </ul>
    </div>
</div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-content">
                <div class="toolbar">
                    <h3>Quản Lý Học Sinh</h3>   
                </div>
                <div class="material-datatables">
                    <table id="datatabless" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Ngày Sinh</th>
                                <th>Giới Tính</th>
                                <th>Email</th>
                                <th>Lớp</th>
                                <th class="disabled-sorting text-right">Chức Năng</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Ngày Sinh</th>
                                <th>Giới Tính</th>
                                <th>Email</th>
                                <th>Lớp</th>
                                <th class="text-right">Chức Năng</th>
                            </tr>
                        </tfoot>
                        <tbody> 
                                @php
                                    $STT = 1;
                                @endphp
                            @foreach ($student as $result)
                                <tr>
                                    <th>{{ $STT++ }}</th>
                                    <th>{{ $result->lastNameStudent." ".$result->fistNameStudent}}</th>
                                    <th>{{ $result->dateBirth }}</th>
                                    <th>{{ $result->gender==1?"nam":"nu" }}</th>
                                    <th>{{ $result->emailStudent }}</th>
                                    <th>{{ $result->nameGrade."k".$result->course }}</th>
                                    <td class="text-right">
                                        @if ($result->statusStudent == 0)
                                            <a href="{{ route('lock-student', $result->idStudent) }}" class="btn btn-simple btn-info btn-icon" rel="tooltip" data-placement="left" title="mở khoá"><span class="material-icons">
                                                lock
                                            </span></a> 
                                        @else
                                            <a href="{{ route('lock-student', $result->idStudent) }}" class="btn btn-simple btn-info btn-icon"  rel="tooltip" data-placement="left" title="khoá"><span class="material-icons">
                                                lock_open
                                            </span></a> 
                                        @endif
                                        
                                        <a data-url="{{ route('studentAdmin.edit', "$result->idStudent") }}" class="btn btn-simple btn-warning btn-icon formUpdate" data-toggle="modal" data-target="#updateStudent" rel="tooltip" data-placement="left" title="Sửa"><span class="material-icons">
                                        border_color
                                        </span></a>
                                        <form data-url="{{ route('studentAdmin.destroy', "$result->idStudent") }}" class="btn btn-simple btn-danger btn-icon deleteForm" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-simple btn-danger btn-icon" rel="tooltip" data-placement="left" title="Xoá">
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

@endsection

@section('modal')

@include('teacher/admin.student.create')

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

                    setTimeout(function(){
                        window.location.href='{{ Route("studentAdmin.index") }}';
                    },500)
            
                }
            });
        }

    });

</script>

{{-- update --}}
@include('teacher/admin.student.update')    
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
                $("#fistNameEdit").val(response.data.fistNameStudent);
                $("#lastNameEdit").val(response.data.lastNameStudent);
                $("#dateBirthEdit").val(response.data.dateBirth);
                var nam = $("#nam").val();
                var nu = $("#nu").val();
                var check = response.data.gender;
                if(check == 1){
                    $("#nam").attr('checked',true);
                    $("#nu").attr("checked",false);
                } 
                if (check == 0){
                    $("#nu").attr("checked",true);
                    $("#nam").attr('checked',false);
                }
                
                $("#emailEdit").val(response.data.emailStudent);
                $("#passEdit").val(response.data.passWordStudent);
                $('select[name=classEdit').val(response.data.idGrade);
                $("#courseUpdate").val(response.data.statusStudent);
                var id = response.data.idStudent;
                $("#form_update").attr('data-url','{{ asset("studentAdmin/") }}/'+id);
            }
        });
        

    });

</script>

{{-- excel --}}
@include('teacher/admin.student.addExcel')


@endsection