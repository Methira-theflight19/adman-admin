<?php

Breadcrumbs::register('admin.awards.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.awards.management'), route('admin.awards.index'));
});

Breadcrumbs::register('admin.awards.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.awards.index');
    $breadcrumbs->push(trans('menus.backend.awards.create'), route('admin.awards.create'));
});

Breadcrumbs::register('admin.awards.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.awards.index');
    $breadcrumbs->push(trans('menus.backend.awards.edit'), route('admin.awards.edit', $id));
});
