<?php

Breadcrumbs::register('admin.achives.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.achives.management'), route('admin.achives.index'));
});

Breadcrumbs::register('admin.achives.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.achives.index');
    $breadcrumbs->push(trans('menus.backend.achives.create'), route('admin.achives.create'));
});

Breadcrumbs::register('admin.achives.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.achives.index');
    $breadcrumbs->push(trans('menus.backend.achives.edit'), route('admin.achives.edit', $id));
});
