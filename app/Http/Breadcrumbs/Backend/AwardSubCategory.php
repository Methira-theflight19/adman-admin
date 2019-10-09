<?php

Breadcrumbs::register('admin.awardsubcategories.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.awardsubcategories.management'), route('admin.awardsubcategories.index'));
});

Breadcrumbs::register('admin.awardsubcategories.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.awardsubcategories.index');
    $breadcrumbs->push(trans('menus.backend.awardsubcategories.create'), route('admin.awardsubcategories.create'));
});

Breadcrumbs::register('admin.awardsubcategories.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.awardsubcategories.index');
    $breadcrumbs->push(trans('menus.backend.awardsubcategories.edit'), route('admin.awardsubcategories.edit', $id));
});
