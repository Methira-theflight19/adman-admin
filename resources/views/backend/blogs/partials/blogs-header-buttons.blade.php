<!--Action Button-->
    @if(Active::checkUriPattern('admin/blogs'))
        <export-component></export-component>
    @endif
<!--Action Button-->
<div class="btn-group">
  <button type="button" class="btn btn-blue btn-flat dropdown-toggle" data-toggle="dropdown">Action
    <span class="fas fa-caret-down"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu dropdown-menu-right" role="menu">
    <li><a href="{{route('admin.blogs.index')}}"><i class="fa fa-list-ul"></i> {{trans('menus.backend.blogs.all')}}</a></li>
    @permission('create-blog')
    <li><a href="{{route('admin.blogs.create')}}"><i class="fa fa-plus"></i> {{trans('menus.backend.blogs.create')}}</a></li>
    @endauth
  </ul>
</div>
<div class="clearfix"></div>