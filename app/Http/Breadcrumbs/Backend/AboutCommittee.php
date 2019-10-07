<?php

Breadcrumbs::register('admin.aboutcommittees.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.aboutcommittees.management'), route('admin.aboutcommittees.index'));
});

Breadcrumbs::register('admin.aboutcommittees.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.aboutcommittees.index');
    $breadcrumbs->push(trans('menus.backend.aboutcommittees.create'), route('admin.aboutcommittees.create'));
});

Breadcrumbs::register('admin.aboutcommittees.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.aboutcommittees.index');
    $breadcrumbs->push(trans('menus.backend.aboutcommittees.edit'), route('admin.aboutcommittees.edit', $id));
});
