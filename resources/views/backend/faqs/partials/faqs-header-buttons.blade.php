<!--Action Button-->
@if(Active::checkUriPattern('admin/faqs'))
    <export-component></export-component>
@endif
<!--Action Button-->
<div class="btn-group">
  <button type="button" class="btn btn-blue btn-flat dropdown-toggle" data-toggle="dropdown">Action
    <span class="fas fa-caret-down"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu dropdown-menu-right" role="menu">
    <li><a href="{{route('admin.faqs.index')}}"><i class="fa fa-list-ul"></i> {{trans('menus.backend.faqs.all')}}</a></li>
    @permission('create-faq')
    <li><a href="{{route('admin.faqs.create')}}"><i class="fa fa-plus"></i> {{trans('menus.backend.faqs.create')}}</a></li>
    @endauth
  </ul>
</div>

<div class="clearfix"></div>