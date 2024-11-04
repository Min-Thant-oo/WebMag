<?php

return [
    'dashboard' => [
        'name'      => 'Dashboard',
        'route'     => 'admin.index',
        'icon'      => 'ti-home',
        'param'     => null
    ],
    'blog' => [
        'name'      => 'Blog',
        'route'     => 'admin.blog.index',
        'icon'      => 'c-deep-orange-500 ti-calendar',
        'param'     => null
    ],
    'comment' => [
        'name'      => 'Comment',
        'route'     => 'admin.comment.index',
        'icon'      => 'c-deep-orange-500 ti-comment-alt',
        'param'     => null
    ],
    'category' => [
        'name'      => 'Category',
        'route'     => 'admin.category.index',
        'icon'      => 'c-deep-red-500 ti-menu',
        'param'     => null
    ],
    'blog-status' => [
        'name'      => 'Blog Status',
        'route'     => 'admin.status.index',
        'icon'      => 'c-deep-green-500 ti-pulse',
        'param'     => null
    ],
    'contact-message' => [
        'name'      => 'Contact Message',
        'route'     => 'admin.contactmessage.index',
        'icon'      => 'c-deep-yellow-500 ti-email',
        'param'     => null
    ],
    'site-config' => [
        'name'      => 'Site Config',
        'route'     => 'admin.siteconfig.edit',
        'icon'      => 'c-deep-yellow-500 ti-settings',
        'param'     => 1
    ],


];
