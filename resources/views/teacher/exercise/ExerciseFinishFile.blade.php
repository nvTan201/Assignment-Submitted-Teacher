@extends('teacher/layout.app')

@section('content')
    
    <div>
        <a type="submit" class="btn btn-primary btn-round" href="{{ route('grade.show',"$exercise->idGrade") }}">
            <i class="material-icons">
                chevron_left
            </i> 
                Bài Tập
        </a>
        <a type="submit" class="btn btn-primary btn-round text-right" href="" style="left: 815px;">
            export
            <i class="material-icons">  
            get_app
            </i> 
        </a>
    </div>
    
    
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-content">
                    <p class="text-right">{{ $exercise->deadlineSubmission }}</p>
                    <h2>{{ $exercise->question }}</h2> 
                    <h3>
                        <div class="alert col-md-9" data-notify="container">
                            <button type="button" class="close">
                                <a href="{{ asset($exercise->content) }}" download>
                                    <i class="material-icons" style="color: black; size: 100px">
                                        get_app   
                                    </i>
                                </a>
                            </button>
                            <span id="fileFinish">{{ basename($exercise->content).PHP_EOL }}</span>
                            <script>
                                var url = "{{ $exercise->content }}";
                                var a = url.split('-').pop().split('.')[0].split('?')[0];
                                var filename = url.split(a+".").pop();
                                $("#fileFinish").html(filename);
                            </script>
                        </div>
                    </h3>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="card-content">
                    <h3 class="card-title">Bài Làm</h3>
                    <div class="toolbar">
                        <!--        Here you can write extra buttons/actions for the toolbar              -->   
                    </div>
                    <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Họ Tên</th>
                                    <th class="disabled-sorting text-right">Điểm</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Họ Tên</th>
                                    <th class="disabled-sorting text-right">Điểm</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                 @foreach ($finish as $result)
                                    <tr>
                                        <td>1</td>
                                        <td>


                                            <a href="{{ route('showFinish', [$result->idExerciseFinish]) }}">{{ $result->fistNameStudent." ".$result->lastNameStudent}}</a>
                                        
                                        
                                        </td>
                                        <td class="text-right">
                                            <div class="col-md-1, col-md-offset-10">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label">{{ $result->mark }}đ</label>
                                                    <input type="text" class="form-control" disabled style="width:40px"> 
                                                </div>
                                            </div>
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
        <!-- end col-md-12 -->
    </div>
    
    <!-- end row -->
</div>
@endsection

@section('modal')
@endsection