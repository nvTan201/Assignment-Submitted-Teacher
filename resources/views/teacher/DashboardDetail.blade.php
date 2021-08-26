@extends('teacher/layout.app')
@section('content')

<div class="row">

        <div class="col-md-11">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="material-icons">&#xE894;</i>
                </div>
                <div class="card-content">
                    <h2 class="card-title"></h2>
                    <div class="row">
                        <div class="col-md-11">
                            <div class="table-responsive table-sales">
                    
                                <table class="table">
                                    <thead class="text-primary">
                                        <th>
                                            Tên
                                        </th>
                                        <th>
                                            Điểm Trung Bình
                                        </th>
                                    </thead>
                                    <tbody>
                                        @php
                                            $number = 0
                                        @endphp
                                        @foreach ($students as $result)
                                            <tr>
                                                <th>
                                                    {{ $students[$number] }}
                                                </th>
                                                <th>
                                                    {{ $mark[$number] }}
                                                </th>
                                            </tr>
                                        
                                            @php
                                                $number++
                                            @endphp
                                        @endforeach
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

            