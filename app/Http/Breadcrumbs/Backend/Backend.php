<?php

Breadcrumbs::register('admin.dashboard', function ($breadcrumbs) {
    $breadcrumbs->push(__('navs.backend.dashboard'), route('admin.dashboard'));
});

require __DIR__.'/Search.php';
require __DIR__.'/Access/User.php';
require __DIR__.'/Access/Role.php';
require __DIR__.'/Access/Permission.php';
require __DIR__.'/Page.php';
require __DIR__.'/Setting.php';
require __DIR__.'/Blog_Category.php';
require __DIR__.'/Blog_Tag.php';
require __DIR__.'/Blog_Management.php';
require __DIR__.'/Faqs.php';
require __DIR__.'/Menu.php';
require __DIR__.'/LogViewer.php';

require __DIR__.'/Banner.php';
require __DIR__.'/Sponsor.php';
require __DIR__.'/Menucategory.php';
require __DIR__.'/Sponsorcategory.php';
require __DIR__.'/Activity.php';
require __DIR__.'/Program.php';
require __DIR__.'/TopicTalk.php';
require __DIR__.'/RoomCategory.php';
require __DIR__.'/TalkDetail.php';
require __DIR__.'/TalkPhoto.php';
require __DIR__.'/AboutChairman.php';
require __DIR__.'/AboutCommitteeCategory.php';
require __DIR__.'/AboutCommittee.php';
require __DIR__.'/Winner.php';
require __DIR__.'/GalleryCategory.php';
require __DIR__.'/Gallery.php';
require __DIR__.'/JudgeCategory.php';