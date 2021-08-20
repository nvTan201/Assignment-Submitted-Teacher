@extends('layout.app')

@section('content')

    
<div class="col-sm-10 col-lg-2 text-right">
    <div class="dropdown text-right">
        <button href="" class="dropdown-toggle btn btn-primary btn-round btn-block" data-toggle="dropdown" style="left: 895px;">Thêm Lớp
            <b class="caret"></b>       
        </button>
        <ul class="dropdown-menu dropdown-menu-right" style="left: 895px;">
            <li class="dropdown-header">Thêm Bài Tập</li>
            <li>
                <a href="" data-toggle="modal" data-target="#createTeacher">
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
                    <h3>Quản Lý Giáo Viên</h3>   
                </div>
                <div class="material-datatables">
                    <table id="datatabless" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th class="disabled-sorting text-right">Chức Năng</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th class="text-right">Chức Năng</th>
                            </tr>
                        </tfoot>
                        <tbody> 
                                @php
                                    $STT = 1;
                                @endphp
                            @foreach ($teacher as $result)
                                <tr>
                                    <th>{{ $STT++ }}</th>
                                    <th>{{ $result->lastNameTeacher." ".$result->fistNameTeacher}}</th>
                                    <th>{{ $result->emailTeacher }}</th>
                                    <td class="text-right">
                                        <a data-url="{{ route('teacher.edit', "$result->idTeacher") }}" class="btn btn-simple btn-warning btn-icon formUpdate" data-toggle="modal" data-target="#updateTeacher" rel="tooltip" data-placement="left" title="Sửa"><span class="material-icons">
                                        border_color
                                        </span></a>
                                        <form data-url="{{ route('teacher.destroy', "$result->idTeacher") }}" class="btn btn-simple btn-danger btn-icon deleteForm" method="POST">
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

@include('admin.teacher.create')

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
                        window.location.href='{{ Route("teacher.index") }}';
                    },500)
            
                }
            });
        }

    });

</script>

{{-- update --}}
@include('admin.teacher.update')
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
                $("#fistNameEdit").val(response.data.fistNameTeacher);
                $("#lastNameEdit").val(response.data.lastNameTeacher);
                $("#emailEdit").val(response.data.emailTeacher);
                $("#passwordEdit").val(response.data.passWordTeacher);
                var id = response.data.idTeacher;
                $("#form_update").attr('data-url','{{ asset("teacher/") }}/'+id);
            }
        });
        

    });

</script>

{{-- excel --}}
@include('admin.teacher.addExcel')


@endsection