<?php

Breadcrumbs::register('admin.galleries.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.galleries.management'), route('admin.galleries.index'));
});

Breadcrumbs::register('admin.galleries.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.galleries.index');
    $breadcrumbs->push(trans('menus.backend.galleries.create'), route('admin.galleries.create'));
});

Breadcrumbs::register('admin.galleries.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.galleries.index');
    $breadcrumbs->push(trans('menus.backend.galleries.edit'), route('admin.galleries.edit', $id));
});
