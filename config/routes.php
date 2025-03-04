<?php

return [

    'dashboard' => [
        'name'      => 'dashboard',
        'title'     => 'Dashboard',
        'icon'      => 'bi bi-grid-1x2',
        'route'     => 'dashboard',
        'auth_lvl'  => 2,
    ],
    'report' => [
        'name'      => 'report',
        'title'     => 'Shift Report',
        'icon'      => 'bi bi-table',
        'route'     => 'dashboard',
        'auth_lvl'  => 2,
    ],
    'employee' => [
        'name'      => 'employee',
        'title'     => 'Employee Management',
        'icon'      => 'bi bi-person',
        'route'     => 'employee',
        'auth_lvl'  => 2,
    ],
];
