<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">
                <li class="menu-title">General</li>
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fe-airplay"></i>
                        <span> Dashboards </span>
                    </a>
                </li>
                <li class="menu-title mt-2">System</li>

                @permission('view-access-management')
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-users "></i>
                        <span>Access Management</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.access.user.index') }}">User Management</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.access.role.index') }}">Role Management</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.access.permission.index') }}">Permission Management</a>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <a href="{{ route('admin.modules.index') }}">
                        <i class="fe-edit-2 "></i>
                        <span> Module </span>
                    </a>
                </li>
                @endauth

                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-bookmark "></i>
                        <span>Banner</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.menucategories.index') }}">Menu Category</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.banners.index') }}">All Banner</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-thumbs-up"></i>
                        <span>Sponsor</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.sponsorcategories.index') }}">
                                <span> Sponsor Category</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.sponsors.index') }}">
                                <span> Sponsor </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('admin.activities.index') }}">
                        <i class="fe-film"></i>
                        <span> Activity </span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-thumbs-up"></i>
                        <span>Creative Day</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.programs.index') }}">
                                <span>Program</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript: void(0);">
                                <span>Talk Management</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="{{ route('admin.topictalks.index') }}">
                                        <span>Topic Talk</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.roomcategories.index') }}">
                                        <span>Room Category</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                
                
           
                <!-- <li>
                    <a href="{{ route('admin.menus.index') }}">
                        <i class="fe-menu "></i>
                        <span> Menus </span>
                    </a>
                </li> -->
         
                <li>
                    <a href="{{ route('admin.pages.index') }}">
                        <i class="fe-file "></i>
                        <span> Pages </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.settings.edit', 1 ) }}">
                        <i class="fe-settings "></i>
                        <span> Setting</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="far fa-comment-dots "></i>
                        <span>Blog Management</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.blogCategories.index') }}">Blog Category Management</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.blogTags.index') }}">Blog Tag Management</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.blogs.index') }}">Blog Management</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.faqs.index')}}">
                        <i class="fas fa-question-circle "></i>
                        <span> Faq Management</span>
                    </a>
                </li>
             




               
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->