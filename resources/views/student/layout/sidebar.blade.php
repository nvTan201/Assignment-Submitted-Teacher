<div class="sidebar" data-active-color="rose" data-background-color="black" data-image="{{ asset('assets') }}/img/sidebar-1.jpg">
            <div class="logo">
                {{-- <a href="http://www.creative-tim.com" class="simple-text logo-mini">
                   
                </a> --}}
                <a href="http://www.creative-tim.com" class="simple-text logo-normal">
                    Assignment Submitted
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="{{ asset('assets') }}/img/faces/avatar.jpg" />
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            <span>
                               Chào {{Session::get('lastNameStudent')}}
                                <b class="caret"></b>
                            </span>
                        </a>
                        <div class="clearfix"></div>
                        <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <li>
                                    <a href="{{ route('logout') }}">
                                        <span class="sidebar-mini"> S </span>
                                        <span class="sidebar-normal"> logout </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav">
                    <li class="">
                        <a href="">
                            <i class="material-icons-outlined"></i>
                            <p> Thông báo </p>
                        </a>
                    </li>
                 
                    <li>
                        <a href="{{ route('file.get-all-file') }}">
                            <i class="material-icons">apps</i>
                            <p> ExerciseFinish
                               
                            </p>
                        </a>
                        
                    </li>

                    <li>
                        <a href="{{ route('Exercise.index') }}">
                            <i class="material-icons">content_paste</i>
                            <p> Exercise
                            
                            </p>
                        </a>
                       
                        
                    </li>
                    <li>
                        <a href="">
                            <i class="material-icons">content_paste</i>
                            <p> Xem điểm
                                
                            </p>
                        </a>
                    </li>
                   
                   
                    <li>
                        <a href="./calendar.html">
                            <i class="material-icons">date_range</i>
                            <p> Calendar </p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>