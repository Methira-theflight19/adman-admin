<?php

Breadcrumbs::register('admin.gallerycategories.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.gallerycategories.management'), route('admin.gallerycategories.index'));
});

Breadcrumbs::register('admin.gallerycategories.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.gallerycategories.index');
    $breadcrumbs->push(trans('menus.backend.gallerycategories.create'), route('admin.gallerycategories.create'));
});

Breadcrumbs::register('admin.gallerycategories.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.gallerycategories.index');
    $breadcrumbs->push(trans('menus.backend.gallerycategories.edit'), route('admin.gallerycategories.edit', $id));
});
