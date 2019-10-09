<?php

Breadcrumbs::register('admin.achivecategories.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.achivecategories.management'), route('admin.achivecategories.index'));
});

Breadcrumbs::register('admin.achivecategories.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.achivecategories.index');
    $breadcrumbs->push(trans('menus.backend.achivecategories.create'), route('admin.achivecategories.create'));
});

Breadcrumbs::register('admin.achivecategories.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.achivecategories.index');
    $breadcrumbs->push(trans('menus.backend.achivecategories.edit'), route('admin.achivecategories.edit', $id));
});
