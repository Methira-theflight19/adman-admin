<?php

Breadcrumbs::register('admin.awardrules.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.awardrules.management'), route('admin.awardrules.index'));
});

Breadcrumbs::register('admin.awardrules.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.awardrules.index');
    $breadcrumbs->push(trans('menus.backend.awardrules.create'), route('admin.awardrules.create'));
});

Breadcrumbs::register('admin.awardrules.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.awardrules.index');
    $breadcrumbs->push(trans('menus.backend.awardrules.edit'), route('admin.awardrules.edit', $id));
});
