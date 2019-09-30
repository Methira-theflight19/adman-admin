<?php

Breadcrumbs::register('admin.sponsorcategories.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.sponsorcategories.management'), route('admin.sponsorcategories.index'));
});

Breadcrumbs::register('admin.sponsorcategories.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.sponsorcategories.index');
    $breadcrumbs->push(trans('menus.backend.sponsorcategories.create'), route('admin.sponsorcategories.create'));
});

Breadcrumbs::register('admin.sponsorcategories.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.sponsorcategories.index');
    $breadcrumbs->push(trans('menus.backend.sponsorcategories.edit'), route('admin.sponsorcategories.edit', $id));
});
