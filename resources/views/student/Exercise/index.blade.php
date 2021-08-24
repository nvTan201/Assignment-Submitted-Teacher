@extends('student.layout.app')
@section('student.content')

<div class="content">
    <form class="navbar-form navbar-top text-right" role="search">
        <div class="form-group form-search is-empty">
            <input type="text" class="form-control" name="search" value="" placeholder=" Search ">
            <span class="material-input"></span>
        </div>
        <button type="submit" class="btn btn-white btn-round btn-just-icon">
            <i class="material-icons">search</i>
            <div class="ripple-container"></div>
        </button>
    </form>
    <div class="row">
        <div class="col-md-12">
            <div class="card"> 
                
                @foreach ($exercises as $exercise)
                <a href="{{ route('Exercise.show', $exercise->idExercise) }}">
                 <table class="table table-striped " >
                        <tr>
                             <td>
                                <b>Upcoming Submission : </b>{{ $exercise->nameGrade  }}
                            </td>
                        </tr>
                        <tr>
                            <td> <label class="label-control"><h2>{{ $exercise->question }}</h2></label>
                                <br>
                                <p class="label-control"> <b>Ngày đăng:</b> {{ $exercise->postingTime }}|<b>Deadline</b>{{ $exercise->deadlineSubmission }} |10Point</p>
                            </td>
                            
                        </tr>
                  </table>
                </a>
                @endforeach
            </div>
       
        </div>
    </div> 
</div>
    

@endsection
