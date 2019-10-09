<?php

Breadcrumbs::register('admin.achivesubcategories.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.achivesubcategories.management'), route('admin.achivesubcategories.index'));
});

Breadcrumbs::register('admin.achivesubcategories.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.achivesubcategories.index');
    $breadcrumbs->push(trans('menus.backend.achivesubcategories.create'), route('admin.achivesubcategories.create'));
});

Breadcrumbs::register('admin.achivesubcategories.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.achivesubcategories.index');
    $breadcrumbs->push(trans('menus.backend.achivesubcategories.edit'), route('admin.achivesubcategories.edit', $id));
});
