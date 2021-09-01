@extends('teacher/layout.app')
@section('content')

<div class="row">
    @php
        $number = 0
    @endphp
    @foreach ($detail as $result)

        <div class="col-md-11">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="material-icons">&#xE894;</i>
                </div>
                <div class="card-content">
                    <h2 class="card-title">{{ $result->nameGrade }}</h2>
                    <div class="row">
                        <div class="col-md-11">
                            <div class="table-responsive table-sales">
                    
                                <table class="table">
                                    <thead class="text-primary">
                                        <th>
                                            Yếu <br>
                                            (<= 4)
                                        </th>
                                        <th>
                                            Trung Bình <br>
                                            (> 4 ,<= 6)
                                        </th>
                                        <th>
                                            Khá<br>
                                            (> 6 ,<= 8)
                                        </th>
                                        <th>
                                            Giỏi <br>
                                            (> 8)
                                        </th>
                                        <th>
                                            Tổng Bài Tập
                                        </th>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <th>
                                                {{ $y[$number] }} bạn
                                            </th>
                                            <th>
                                                {{ $tb[$number] }} bạn
                                            </th>
                                            <th>
                                                {{ $k[$number] }} bạn
                                            </th>
                                            <th>
                                                {{ $g[$number] }} bạn
                                            </th>
                                            <th>
                                                {{ $count[$number] }} bài
                                            </th>   
                                        </tr>
                                        <tr>
                                            <th>
                                                <form action="{{ route('teacher.dashboard-show', $result->idGrade) }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="title" value="1">
                                                    <button class="btn">Chi Tiet</button>
                                                </form>
                                            </th>
                                            <th>
                                                <form action="{{ route('teacher.dashboard-show', $result->idGrade) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="title" value="2">
                                                    <button class="btn">Chi Tiet</button>
                                                </form>
                                            </th>
                                            <th>
                                                <form action="{{ route('teacher.dashboard-show', $result->idGrade) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="title" value="3">
                                                    <button class="btn">Chi Tiet</button>
                                                </form>
                                            </th>
                                            <th>
                                                <form action="{{ route('teacher.dashboard-show', $result->idGrade) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="title" value="4">
                                                    <button class="btn">Chi Tiet</button>
                                                </form>
                                            </th>
                                            <th></th>
                                        </tr>
                                        
                                    </tbody>
                                </table>    
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @php
            $number++
        @endphp
    @endforeach
</div>      

@endsection

            