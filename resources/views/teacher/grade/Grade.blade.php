@extends('teacher/layout.app')

@section('content')

<div class="text-right">
    <button type="button" class="btn btn-primary btn-round" data-toggle="modal" data-target="#createModal">
        <i class="material-icons">
            add
        </i> 
            Thêm Lớp
    </button>
</div>
<div class="row">
    @foreach ($detail as $result)
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="rose">
                    <i class="material-icons">class</i>
                </div>
                    <div class="text-right">
                        <form action="{{ route('grade.destroy',"$result->idGrade") }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="idTeacher" value="{{ $result->idTeacher }}">
                            <button class="btn btn-simple" id="btnDelete" rel="tooltip" data-placement="left" title="Xoá">
                                <i class="material-icons" >close</i>
                            </button>
                        </form>
                    </div>
                <a href="{{ route('grade.show',"$result->idGrade") }}">
                    <div class="card-content">
                        <p class="category"></p>
                        <h3 class="card-title">{{ $result->nameGrade."_k".$result->course}}</h3>
                    </div>
                </a>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">face</i>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
    
@endsection

@section('modal')
{{-- create --}}
@include('teacher/grade.create')
{{-- delete --}}
@endsection
