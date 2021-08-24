@extends('teacher/layout.app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="green">
                <i class="material-icons">&#xE894;</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Lớp</h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive table-sales">
                
                            <table class="table">
                                <thead class="text-primary">
                                    <th>
                                        Yếu <br>
                                        (< 4)
                                    </th>
                                    <th>
                                        Trung Bình <br>
                                        (>= 4 ,<= 6)
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
                                            <a href="">Chi Tiet</a>
                                        </th>
                                        <th>
                                            <a href="">Chi Tiet</a>
                                        </th>
                                        <th>
                                            <a href="">Chi Tiet</a>
                                        </th>
                                        <th>
                                            <a href="">Chi Tiet</a>
                                        </th>
                                        <th>
                                            20
                                        </th>
                                    </tr>
                                </tbody>
                            </table>    
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>      

@endsection

            