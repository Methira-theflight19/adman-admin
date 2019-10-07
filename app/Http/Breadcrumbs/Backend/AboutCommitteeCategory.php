<?php

Breadcrumbs::register('admin.aboutcommitteecategories.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.aboutcommitteecategories.management'), route('admin.aboutcommitteecategories.index'));
});

Breadcrumbs::register('admin.aboutcommitteecategories.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.aboutcommitteecategories.index');
    $breadcrumbs->push(trans('menus.backend.aboutcommitteecategories.create'), route('admin.aboutcommitteecategories.create'));
});

Breadcrumbs::register('admin.aboutcommitteecategories.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.aboutcommitteecategories.index');
    $breadcrumbs->push(trans('menus.backend.aboutcommitteecategories.edit'), route('admin.aboutcommitteecategories.edit', $id));
});
