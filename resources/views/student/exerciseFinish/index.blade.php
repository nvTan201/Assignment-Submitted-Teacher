@extends('student.layout.app')
@section('student.content')

<div class="content">
    <div class="card">
        <h3>Các bài tập đã nộp</h3>
        <table class="table table-striped">
            <thead>
              <tr>
                  <th scope="col">#</th>
                  <th scope="col">Tên file/Text</th>
                  <th  scope="col">Nội dung</th>
                  <th scope="col">Ngày nộp</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $number=1
                @endphp
                @foreach($files as $file)
                    <tr>
                        <th scope="row">{{ $file->idExerciseFinish }}</th>
                        <td>{{ $file->question }}</td>
                        @if ($file->title==0)
                            <td>{{ $file->exerciseFinish }}</td>
                        @else
                            <input type="hidden" id="link{{ $number }}" value="{{ $file->exerciseFinish }}">
                            <td id="exerciseFinish{{ $number }}"></td>
                            <script>
                                var url = $("#link{{ $number }}").val();
                                var a = url.split('-').pop().split('.')[0].split('?')[0];
                                var filename = url.split(a+".").pop();
                                $("#exerciseFinish{{ $number }}").html(filename+" (Nộp bằng file)");
                            </script>
                        @endif
                        <td>{{ $file->responseTime }}</td>
                    </tr>
                    @php
                        $number++
                    @endphp
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
