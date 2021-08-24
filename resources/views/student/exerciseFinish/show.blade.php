@extends('student.layout.app')
@section('student.content')
    
<div class="content">
    <table class="table table-striped">
        <tr>
            <th>Tên bài tập</th>
            <th>Ngày nộp</th>
            <th>Điểm</th>
            <th>Đánh giá</th>
        </tr>
        
            <tr>
                <td>{{ $exerciseFinishs->exerciseFinish}}</td>
                <td>{{ $exerciseFinishs->respponTime}}</td>
                <td>{{ $exerciseFinishs->mark}}</td>
                <td>{{ $exerciseFinishs->note}}</td>
            </tr>
      
        
      </table>
</div>
@endsection