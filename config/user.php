<?php

return [
    'filters' => [
        // 'name' => \App\User\Filters\NameFilter::class,
        // 'email' => \App\User\Filters\EmailFilter::class,
        // 'created_at' => \App\User\Filters\CreatedAtFilter::class,
        'role_id' => \App\User\Filters\RoleFilter::class,
        // 'search' => \App\User\Filters\SearchFilter::class
    ],
    'search_fields' => [
        'name', 'email','userRole.name'
    ]
];