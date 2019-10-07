<?php

Breadcrumbs::register('admin.winners.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.winners.management'), route('admin.winners.index'));
});

Breadcrumbs::register('admin.winners.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.winners.index');
    $breadcrumbs->push(trans('menus.backend.winners.create'), route('admin.winners.create'));
});

Breadcrumbs::register('admin.winners.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.winners.index');
    $breadcrumbs->push(trans('menus.backend.winners.edit'), route('admin.winners.edit', $id));
});
