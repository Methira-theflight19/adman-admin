<?php

Breadcrumbs::register('admin.roomcategories.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.roomcategories.management'), route('admin.roomcategories.index'));
});

Breadcrumbs::register('admin.roomcategories.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.roomcategories.index');
    $breadcrumbs->push(trans('menus.backend.roomcategories.create'), route('admin.roomcategories.create'));
});

Breadcrumbs::register('admin.roomcategories.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.roomcategories.index');
    $breadcrumbs->push(trans('menus.backend.roomcategories.edit'), route('admin.roomcategories.edit', $id));
});
