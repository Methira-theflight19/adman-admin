<?php

Breadcrumbs::register('admin.talkdetails.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.talkdetails.management'), route('admin.talkdetails.index'));
});

Breadcrumbs::register('admin.talkdetails.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.talkdetails.index');
    $breadcrumbs->push(trans('menus.backend.talkdetails.create'), route('admin.talkdetails.create'));
});

Breadcrumbs::register('admin.talkdetails.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.talkdetails.index');
    $breadcrumbs->push(trans('menus.backend.talkdetails.edit'), route('admin.talkdetails.edit', $id));
});
