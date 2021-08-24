<div class="sidebar" data-active-color="rose" data-background-color="black" data-image="{{ asset('assets') }}/img/sidebar-1.jpg">
            <div class="logo">
                <a href="#collapseExampleq" class="simple-text logo-mini">
                   TT
                </a>
                <a href="#collapseExample" class="simple-text logo-normal">
                   submit homeworks
                </a>
                <div class="clearfix"></div>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="{{ asset('assets') }}/img/faces/avatar.jpg" />
                    </div>
                        
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            <span>
                                {{ session()->get('fistName')." ".session()->get('lastName') }}
                                @if (session()->get('id')!=1)
                                    <b class="caret"></b>
                                @endif
                               
                            </span>
                        </a>
                        @if (session()->get('id')!=1)
                            <div class="clearfix"></div>
                            <div class="collapse" id="collapseExample">
                                <ul class="nav">
                                    <li>
                                        <a href="{{ route('account') }}">
                                            <span class="sidebar-mini"> EI </span>
                                            <span class="sidebar-normal"> Edit Information </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="sidebar-mini"> EP </span>
                                            <span class="sidebar-normal"> Edit Password </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                @if  (session()->get('id')!=1)
                    <ul class="nav">
                        <li>
                            <a href="{{ route('teacher.Dashboard') }}">
                                <i class="material-icons">dashboard</i>
                                <p> Dashboard </p>
                            </a>
                        </li>
                        <li>
                            {{-- <a href="{{ route('histori') }}"> --}}
                            <a href="{{ route('grade.index') }}">
                                <i class="material-icons">grading</i>
                                <p> Class </p>
                            </a>
                        </li>
                        <li>    
                            <a href="{{ route('teacher.calendar') }}">
                                <i class="material-icons">date_range</i>
                                <p> Calendar </p>
                            </a>
                        </li>
                    </ul>
                @else
                    <ul class="nav">
                        <li>
                            <a href="{{ route('class.index') }}">
                                <i class="material-icons">class</i>
                                <p> Lớp </p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('teacher.index') }}">
                                <i class="material-icons">school</i>
                                <p> Giáo Viên </p>
                            </a>
                        </li>
                        <li>    
                            <a href="{{ route('studentAdmin.index') }}">
                                <i class="material-icons">face_retouching_natural</i>
                                <p> Sinh Viên </p>
                            </a>
                        </li>
                    </ul>
                @endif
                
            </div>
        </div>