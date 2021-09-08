@extends('student.layout.app')
@section('student.content')

<div class="content">
    <div class="card-header card-header-icon" data-background-color="rose">
        <i class="material-icons">assignment</i>
    </div>
 
    <div class="table-responsive">
        <form action="{{ route('student.update', $student->idStudent) }}" method="POST">
            @csrf
            @method("PUT")
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Tên học sinh</label>
                <div class="col-sm-10">
                  <input type="text"  class="form-control-plaintext" name="fistNameStudent" id="staticEmail" value="{{ $student->fistNameStudent }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Tên học sinh</label>
                <div class="col-sm-10">
                  <input type="text"  class="form-control-plaintext" name="lastNameStudent" id="staticEmail" value="{{ $student->lastNameStudent }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Ngày sinh</label>
                <div class="col-sm-10">
                  <input type="text"  class="form-control-plaintext" name="date" id="staticEmail" value="{{ $student->dateBirth }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Giới tính</label>
                <div class="col-sm-10">
                  <input type="radio"  class="form-control-plaintext" name="gender" {{ $student->gender==1?"checked":"" }} id="staticEmail" value="1">nam
                  <input type="radio"  class="form-control-plaintext" name="gender" {{ $student->gender==0?"checked":"" }} id="staticEmail" value="0">nu
                </div>
              </div>
            <div class="form-group row">
              <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="text"  class="form-control-plaintext" name="email" id="staticEmail" value="{{ $student->emailStudent }}">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control-plaintext" name="pass" id="staticEmail" value="{{ $student->passWordStudent }}">
            </div>
            <button class="btn">Save</button>
          </form>
        
        
</div>
@endsection