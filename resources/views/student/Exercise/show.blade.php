@extends('student.layout.app')
@section('student.content')
    
<div class="content">
    <div class="card">
            <div class="card-content">
            
                <div class="">

                    <table class="table">
                        <thead class="text-primary">
                            <th><h3>Relation View</h3></th>
                        <th> 
                            
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Start Assignment</button>
                      
                        </th>
                    </thead>
                        <tr>
                            <td>

                                <b>Due </b>  {{ $exercises->postingTime }}
                                <br>
                                <p> <b>Submisstting </b> file upload</p>
                                <br>
                                <p>Dealine : {{ $exercises->deadlineSubmission }}</p>

                                <h3><b>Đề bài: </b> {{ $exercises->question }}</h3><br>
                            </td>
                        </tr>
                        <tr>
                            <br>
                               
                                <td>
                                    <form id="form1">
                                        <div id="dvContainer">
                                            <h4><b>Nội dung: <br></b>
                                            @if ($exercises->title == 0)
                                                <p>{!! $exercises->content !!}</p></h4>
                                            @else
                                                <div class="alert col-md-9" data-notify="container">
                                                    <button type="button" class="close">
                                                        <a href="{{ asset($exercises->content) }}" download>
                                                            <i class="material-icons" style="color: black; size: 100px">
                                                                get_app   
                                                            </i>
                                                        </a>
                                                    </button>
                                                    <span id="fileFinish">{{ basename($exercises->content).PHP_EOL }}</span>
                                                    <script>
                                                        var url = "{{ $exercises->content }}";
                                                        var a = url.split('-').pop().split('.')[0].split('?')[0];
                                                        var filename = url.split(a+".").pop();
                                                        $("#fileFinish").html(filename);
                                                    </script>
                                                </div>
                                            @endif
                                            <br> <br><br>
                                        </div>  
                                        {{-- @if ($exercises->title == 1) --}}
                                            <input type="button" value="tải về" id="btnPrint" />
                                        {{-- @endif --}}
                                    </form>
                                        <script type="text/javascript">
                                            $("#btnPrint").live("click", function () {
                                                var divContents = $("#dvContainer").html();
                                                var printWindow = window.open('', '', 'height=400,width=800');
                                                printWindow.document.write('<html><head><title>ĐỀ BÀI</title>');
                                                printWindow.document.write('</head><body >');
                                                printWindow.document.write(divContents);
                                                printWindow.document.write('</body></html>');
                                                printWindow.document.close();
                                                printWindow.print();
                                            });
                                        </script>
                                </td>
                               
                                <br>
                               
                            </tr>
                            <tr>
                        </tr>
                </table>


                
            </div>
        </div>

    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
           
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nộp bài tập</h5>
                </div>
                <div class="modal-body">
               
                            <div class="card">
                               
                                <div class="card-content">
                                    <ul class="nav nav-pills nav-pills-warning">
                                        <li class="active">
                                            <a href="#pill1" data-toggle="tab">File Upload</a>
                                        </li>
                                        <li>
                                            <a href="#pill2" data-toggle="tab">Text Entry</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="pill1">
                                            <form enctype="multipart/form-data" action="{{ route('file.upload-file') }}" method="POST">
                                                @csrf
                                            <input type="hidden" name="title" value="1">
                                            <br>
                                            <input type="hidden" name="idExercise" value="{{ $exercises->idExercise }}">
                                            <br>
                                             Ngày nộp: <input type='datetime' id='date' value='<?php echo date('Y-m-d h:m:s');?>'name="responseTime" readonly> 
                                             
                                                <script>
                                                    var today = new Date();
                                                    var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
                                                    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                                                    var dateTime = date+''+time;
                                                    document.getElementById("date").innerHTML= dateTime;
                                                </script>
                                                <br>
                                               
                                                    <label for="exampleFormControlFile1">Example file input</label>
                                                    
                                                   <input type="file" name="file" accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf"/> 
                                                   <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Upload</button>
                                                    </div>
                                                </form>
                                        </div>
                                        <div class="tab-pane" id="pill2">
                                            <h4>Làm bài tập</h4>
                                            <form action="{{ route('ExerciseFinish.store') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="title" value="0">
                                                <input type="hidden" name="idExercise" value="{{ $exercises->idExercise }}">

                                            Ngay nop:  <input type='datetime' id='date' value='<?php echo date('Y-m-d h:m:s');?>' min ="{{ asset($exercises->postingTime) }}"
                                                max="{{ asset($exercises->deadlineSubmission) }}" name="responseTime" readonly><br><br>

                                                <textarea name="text" id="text" cols="100" rows="10"></textarea>
                                                <br>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary ">Nop bai  </button>
                                                <script>
                                                    CKEDITOR.replace( 'text' );
                                                    
                                                </script>
                                                
                                            </form>
                                                   
                                        </div>  
                                    </div>
                                </div>
                            </div>
                </div>
               
            
        </div>
    </div>
</div>
@endsection

            