@extends('student.layout.app')
@section('student.content')

<div class="content">
    <div class="card-header card-header-icon" data-background-color="rose">
        <i class="material-icons">assignment</i>
    </div>
 
    <div class="table-responsive">
        <form>
            @foreach ($students as $student)
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Tên học sinh</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $student->fistNameStudent." ". $student->lastNameStudent}}">
                </div>
              </div>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Ngày sinh</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $student->dateBirth }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Giới tính</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $student->gender==1?"nam":"nữ" }}">
                </div>
              </div>
            <div class="form-group row">
              <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $student->emailStudent }}">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control-plaintext" id="staticEmail" value="{{ $student->passWordStudent }}">
            </div>
            @endforeach 
          </form>
        
        <a href="{{ route('student.edit', Session::get('idStudent')) }}" class="btn">Sửa Thông Tin</a>
        
</div>
@endsection