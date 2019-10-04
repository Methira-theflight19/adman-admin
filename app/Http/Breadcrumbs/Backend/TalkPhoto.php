<?php

Breadcrumbs::register('admin.talkphotos.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.talkphotos.management'), route('admin.talkphotos.index'));
});

Breadcrumbs::register('admin.talkphotos.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.talkphotos.index');
    $breadcrumbs->push(trans('menus.backend.talkphotos.create'), route('admin.talkphotos.create'));
});

Breadcrumbs::register('admin.talkphotos.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.talkphotos.index');
    $breadcrumbs->push(trans('menus.backend.talkphotos.edit'), route('admin.talkphotos.edit', $id));
});
