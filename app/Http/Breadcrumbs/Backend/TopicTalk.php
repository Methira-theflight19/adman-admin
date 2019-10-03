<?php

Breadcrumbs::register('admin.topictalks.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.topictalks.management'), route('admin.topictalks.index'));
});

Breadcrumbs::register('admin.topictalks.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.topictalks.index');
    $breadcrumbs->push(trans('menus.backend.topictalks.create'), route('admin.topictalks.create'));
});

Breadcrumbs::register('admin.topictalks.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.topictalks.index');
    $breadcrumbs->push(trans('menus.backend.topictalks.edit'), route('admin.topictalks.edit', $id));
});
