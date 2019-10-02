<?php

Breadcrumbs::register('admin.activities.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.activities.management'), route('admin.activities.index'));
});

Breadcrumbs::register('admin.activities.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.activities.index');
    $breadcrumbs->push(trans('menus.backend.activities.create'), route('admin.activities.create'));
});

Breadcrumbs::register('admin.activities.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.activities.index');
    $breadcrumbs->push(trans('menus.backend.activities.edit'), route('admin.activities.edit', $id));
});
