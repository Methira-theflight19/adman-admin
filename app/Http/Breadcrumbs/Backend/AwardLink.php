<?php

Breadcrumbs::register('admin.awardlinks.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.awardlinks.management'), route('admin.awardlinks.index'));
});

Breadcrumbs::register('admin.awardlinks.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.awardlinks.index');
    $breadcrumbs->push(trans('menus.backend.awardlinks.create'), route('admin.awardlinks.create'));
});

Breadcrumbs::register('admin.awardlinks.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.awardlinks.index');
    $breadcrumbs->push(trans('menus.backend.awardlinks.edit'), route('admin.awardlinks.edit', $id));
});
