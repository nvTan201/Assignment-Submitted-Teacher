@extends('student.layout.app')
@section('student.content')
    
<div class="content">
         <div class="card" style="width: 100rem;">
            <div class="card-body">
            
            @foreach ($finishs as $finish)
                    <div class="col-md-7">
                        <h3>Đề bài: {{ $finish->question }}</h3>
                        <br>
                        Ngày đăng:<p>{{ $finish->postingTime }}</p>
                        Ngày nộp : <p>{{ $finish->responseTime }}</p>
                        <p> Điểm :{{ $finish->mark }}</p>
                        <a href="{{ route('Points.show',$finish->idExerciseFinish)}}"><button>Xem chi tiết</button></a>
                        <hr>
                    </div>
            @endforeach
            </div>
        </div>  
          
</div>
@endsection