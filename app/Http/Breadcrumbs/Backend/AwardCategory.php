<?php

Breadcrumbs::register('admin.awardcategories.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.awardcategories.management'), route('admin.awardcategories.index'));
});

Breadcrumbs::register('admin.awardcategories.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.awardcategories.index');
    $breadcrumbs->push(trans('menus.backend.awardcategories.create'), route('admin.awardcategories.create'));
});

Breadcrumbs::register('admin.awardcategories.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.awardcategories.index');
    $breadcrumbs->push(trans('menus.backend.awardcategories.edit'), route('admin.awardcategories.edit', $id));
});
