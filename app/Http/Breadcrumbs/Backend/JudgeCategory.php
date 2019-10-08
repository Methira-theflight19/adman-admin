<?php

Breadcrumbs::register('admin.judgecategories.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.judgecategories.management'), route('admin.judgecategories.index'));
});

Breadcrumbs::register('admin.judgecategories.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.judgecategories.index');
    $breadcrumbs->push(trans('menus.backend.judgecategories.create'), route('admin.judgecategories.create'));
});

Breadcrumbs::register('admin.judgecategories.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.judgecategories.index');
    $breadcrumbs->push(trans('menus.backend.judgecategories.edit'), route('admin.judgecategories.edit', $id));
});
