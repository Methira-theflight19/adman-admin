<!-- Topbar Start -->
<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">

    
        
        <!-- <li class="dropdown d-none d-lg-block">
            <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                Language
                <i class="mdi mdi-chevron-down"></i> 
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="javascript:void(0);" class="dropdown-item">
                    <i class="fas fa-bacon  mr-1"></i>
                    <span>Spanish</span>
                </a>
            </div>
        </li> -->

        
        <!-- <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle  waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="fas fa-envelope  noti-icon"></i>
                <span class="badge badge-danger rounded-circle noti-icon-badge">9</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-lg"> -->

                <!-- item-->
                <!-- <div class="dropdown-item noti-title">
                    <h5 class="m-0">
                        <span class="float-right">
                        </span>{{ trans_choice('strings.backend.general.you_have.messages', 0, ['number' => 0]) }}
                    </h5>
                </div> -->

                <!-- All-->
                <!-- <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                    {{ trans('strings.backend.general.see_all.messages') }}
                    <i class="fi-arrow-right"></i>
                </a>

            </div>
        </li>

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle  waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class=" fas fa-bell  noti-icon"></i>
                <span class="badge badge-danger rounded-circle noti-icon-badge">9</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-lg"> -->

                   <!-- item-->
                <!-- <div class="dropdown-item noti-title">
                    <h5 class="m-0">
                        <span class="float-right">
                        </span>{{ trans_choice('strings.backend.general.you_have.messages', 0, ['number' => 0]) }}
                    </h5>
                </div> -->

                <!-- All-->
                <!-- <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                    {{ trans('strings.backend.general.see_all.messages') }}
                    <i class="fi-arrow-right"></i>
                </a>

            </div>
        </li>
        
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle  waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="fas fa-flag  noti-icon"></i>
                <span class="badge badge-danger rounded-circle noti-icon-badge">9</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-lg"> -->

                       <!-- item-->
                <!-- <div class="dropdown-item noti-title">
                    <h5 class="m-0">
                        <span class="float-right">
                        </span>{{ trans_choice('strings.backend.general.you_have.tasks', 0, ['number' => 0]) }}
                    </h5>
                </div> -->

                <!-- All-->
                <!-- <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                    {{ trans('strings.backend.general.see_all.tasks') }}
                    <i class="fi-arrow-right"></i>
                </a>
            </div>
        </li>

         -->
        

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <!-- <img src="assets/images/users/user-1.jpg" alt="user-image" class="rounded-circle"> -->
                <img src="{{ access()->user()->picture }}" class="rounded-circle" alt="User Avatar"/>
                <span class="pro-user-name ml-1">
                {{ access()->user()->first_name }}<i class="mdi mdi-chevron-down"></i> 
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome !</h6>
                </div>

                <!-- item-->
                <a href="{{route('admin.profile.edit')}}" class="dropdown-item notify-item">
                    <i class="fas fa-edit "></i>
                    <span>Edit Profile</span>
                </a>

                <!-- item-->
                <a href="{{route('admin.access.user.change-password', access()->user()->id)}}"  class="dropdown-item notify-item">
                    <i class="fas fa-unlock"></i>
                    <span>Change Password</span>
                </a>

                <!-- item-->
                <a href="{!! route('frontend.index') !!}" class="dropdown-item notify-item">
                    <i class=" fas fa-home "></i>
                    <span>Home</span>
                </a>

                <div class="dropdown-divider"></div>

                <!-- item-->
                <a href="{!! route('frontend.auth.logout') !!}" class="dropdown-item notify-item">
                    <i class="fe-log-out"></i>
                    <span>Logout</span>
                </a>

            </div>
        </li>

     


    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="{{ route('frontend.index') }}" class="logo text-center">
            <span class="logo-lg">
                <img class="w-75" src="/assets/images/company/logo.png" alt="" >
                <!-- <span class="logo-lg-text-light">UBold</span> -->
            </span>
            <span class="logo-sm">
                <!-- <span class="logo-sm-text-dark">U</span> -->
                <img class="w-75" src="/assets/images/company/logo-sm.png" alt="" >
            </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <!-- left -->
        <li>
            <button class="button-menu-mobile waves-effect waves-light">
                <i class="fe-menu"></i>
            </button>
        </li>

    </ul>
</div>
<!-- end Topbar -->