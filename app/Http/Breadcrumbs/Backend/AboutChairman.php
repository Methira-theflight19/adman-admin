<?php

Breadcrumbs::register('admin.aboutchairman.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.aboutchairman.management'), route('admin.aboutchairman.index'));
});

Breadcrumbs::register('admin.aboutchairman.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.aboutchairman.index');
    $breadcrumbs->push(trans('menus.backend.aboutchairman.create'), route('admin.aboutchairman.create'));
});

Breadcrumbs::register('admin.aboutchairman.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.aboutchairman.index');
    $breadcrumbs->push(trans('menus.backend.aboutchairman.edit'), route('admin.aboutchairman.edit', $id));
});
