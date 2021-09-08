@extends('student.layout.app')
@section('student.content')
    
<div class="content"> 
    <a href="javascript:history.back()" ><u><button class="btn btn warning"> quay lại</button></u></a>

    <h3>Xem chi tiết tại đây</h3>

    <div class="card" style="width: 100rem;">
        <div class="card-body">

            <h3 class="card-title"><b>Đề bài : {{$finishs->question  }}</b></h3>
            <br>
            
            <div class="container">
                <div class="row">
                  <div class="col-sm">
                    Ngày giao bài tập :{{ $finishs->postingTime }}
                    
                  Hạn nộp: {{ $finishs->deadlineSubmission }}
                  </div>
                  <br>
                  <div class="col-sm">
                     Điểm : {{ $finishs->mark }}/10
                  </div>
                  <br>
                  <div class="col-sm">
                 
                        @if ($check=0)
                          <span class="border border-success">Tình trạng nộp : Nộp bài muộn</span>
                        @else
                            <span class="border border-success">Tình trạng nộp : Nộp đúng hạn</span>
                        @endif
               
                  </div>
                </div>
              </div>
            
            <br>
            
            <br>
           
            
           
            <p class="card-title">Ngày nộp  : {{ $finishs->responseTime }}</p>
            <br>
            
            @if ($finishs->titleFinish == 0)
            <h6 class="card-subtitle mb-2 text-muted"><b> bài làm :</b></h6>
                {!! $finishs->exerciseFinish !!}
            @else
            <h6 class="card-subtitle mb-2 text-muted"><b> File đã nộp :</b></h6>
                <div class="form-group lable-floating">
                    <div class="alert col-md-7" dada-notify="container">
                        <button type="button" class="close" value="Dowload" id="btnPrint">
                            <a href="{{ asset($finishs->exerciseFinish) }}" id="dvContainer">
                                <i class="material-icons" style="color: black;size:100px"> get_app</i>
                            </a>
                        </button>
                        <span id="fileFinish"> {{ basename($finishs->exerciseFinish ).PHP_EOL}}</span>
                    </div>
                </div>
            @endif
            
            

            <br>
            <br>
            <br>
           
            Ghi chú :<textarea cols="100" rows="10" disabled>{{ $finishs->note }}</textarea>

          </div>
          
    </div>
          
</div>
@endsection