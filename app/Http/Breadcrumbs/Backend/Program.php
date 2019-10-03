<?php

Breadcrumbs::register('admin.programs.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.programs.management'), route('admin.programs.index'));
});

Breadcrumbs::register('admin.programs.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.programs.index');
    $breadcrumbs->push(trans('menus.backend.programs.create'), route('admin.programs.create'));
});

Breadcrumbs::register('admin.programs.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.programs.index');
    $breadcrumbs->push(trans('menus.backend.programs.edit'), route('admin.programs.edit', $id));
});
