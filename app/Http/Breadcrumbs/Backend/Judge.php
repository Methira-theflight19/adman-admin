<?php

Breadcrumbs::register('admin.judges.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.judges.management'), route('admin.judges.index'));
});

Breadcrumbs::register('admin.judges.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.judges.index');
    $breadcrumbs->push(trans('menus.backend.judges.create'), route('admin.judges.create'));
});

Breadcrumbs::register('admin.judges.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.judges.index');
    $breadcrumbs->push(trans('menus.backend.judges.edit'), route('admin.judges.edit', $id));
});
