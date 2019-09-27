<?php

Breadcrumbs::register('admin.menucategories.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.menucategories.management'), route('admin.menucategories.index'));
});

Breadcrumbs::register('admin.menucategories.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.menucategories.index');
    $breadcrumbs->push(trans('menus.backend.menucategories.create'), route('admin.menucategories.create'));
});

Breadcrumbs::register('admin.menucategories.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.menucategories.index');
    $breadcrumbs->push(trans('menus.backend.menucategories.edit'), route('admin.menucategories.edit', $id));
});
