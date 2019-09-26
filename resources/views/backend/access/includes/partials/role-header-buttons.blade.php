<!--Action Button-->
    @if(Active::checkUriPattern('admin/access/role'))
        @include('backend.access.includes.partials.header-export')
    @endif
<!--Action Button-->
<div class="btn-group">
  <button type="button" class="btn btn-blue btn-flat dropdown-toggle" data-toggle="dropdown">Action
    <span class="fas fa-caret-down"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu dropdown-menu-right"  role="menu">
    <li><a href="{{route('admin.access.role.index')}}"><i class="fa fa-list-ul"></i> {{trans('menus.backend.access.roles.all')}}</a></li>
    @permission('create-role')
    <li><a href="{{route('admin.access.role.create')}}"><i class="fa fa-plus"></i> {{trans('menus.backend.access.roles.create')}}</a></li>
    @endauth
  </ul>
</div>