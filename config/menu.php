<?php
return [
    [
        'label' => 'Dashboard',
        'icon' => 'bx bx-home-circle',
        'route' => 'dashboard',
        'active' => 'dashboard',
    ],
    [
        'label' => 'Gudang',
        'icon' => 'bx bx-box',
        'roles' => ['Gudang', 'Admin'],
        'children' => [
            [
                'label' => 'Stock',
                'route' => 'gudang.stock.index',
                'active' => 'gudang.stock.*',
            ],
            [
                'label' => 'BPG – Input',
                'route' => 'bpgs.create',
                'active' => 'bpgs.*',
            ],
            [
                'label' => 'TTPB – Daftar',
                'route' => 'ttpb.index',
                'params' => ['from' => 'gudang'],
                'active' => 'ttpb.index',
            ],
            [
                'label' => 'TTPB – Buat',
                'route' => 'ttpb.create',
                'params' => ['from' => 'gudang'],
                'active' => 'ttpb.create',
            ],
        ],
    ],
    [
        'label' => 'Pencucian',
        'icon' => 'bx bx-water',
        'roles' => ['Pencucian', 'Admin'],
        'children' => [
            [
                'label' => 'TTPB – Terima',
                'route' => 'pencucian.ttpb.receive',
                'active' => 'pencucian.ttpb.receive',
            ],
            [
                'label' => 'TTPB – Buat/Kirim',
                'route' => 'pencucian.ttpb.create',
                'active' => 'pencucian.ttpb.create',
            ],
            [
                'label' => 'Monitoring Pencucian',
                'route' => 'pencucian.monitoring',
                'active' => 'pencucian.monitoring',
            ],
        ],
    ],
    [
        'label' => 'Pengeringan',
        'icon' => 'bx bx-wind',
        'roles' => ['Pengeringan', 'Admin'],
        'children' => [
            [
                'label' => 'TTPB – Terima',
                'route' => 'pengeringan.ttpb.receive',
                'active' => 'pengeringan.ttpb.receive',
            ],
            [
                'label' => 'TTPB – Buat/Kirim',
                'route' => 'pengeringan.ttpb.create',
                'active' => 'pengeringan.ttpb.create',
            ],
            [
                'label' => 'Monitoring Pengeringan',
                'route' => 'pengeringan.monitoring',
                'active' => 'pengeringan.monitoring',
            ],
        ],
    ],
    [
        'label' => 'Blower/Sortasi',
        'icon' => 'bx bx-layer',
        'roles' => ['Blower', 'Admin'],
        'children' => [
            [
                'label' => 'TTPB – Terima',
                'route' => 'blower.ttpb.receive',
                'active' => 'blower.ttpb.receive',
            ],
            [
                'label' => 'TTPB – Buat/Kirim',
                'route' => 'blower.ttpb.create',
                'active' => 'blower.ttpb.create',
            ],
            [
                'label' => 'Monitoring Blower',
                'route' => 'blower.monitoring',
                'active' => 'blower.monitoring',
            ],
        ],
    ],
    [
        'label' => 'Grinding',
        'icon' => 'bx bx-cog',
        'roles' => ['Grinding', 'Admin'],
        'children' => [
            [
                'label' => 'TTPB – Terima',
                'route' => 'grinding.ttpb.receive',
                'active' => 'grinding.ttpb.receive',
            ],
            [
                'label' => 'TTPB – Buat/Kirim',
                'route' => 'grinding.ttpb.create',
                'active' => 'grinding.ttpb.create',
            ],
            [
                'label' => 'Monitoring Grinding',
                'route' => 'grinding.monitoring',
                'active' => 'grinding.monitoring',
            ],
        ],
    ],
    [
        'label' => 'Mixing',
        'icon' => 'bx bx-beaker',
        'roles' => ['Mixing', 'Admin'],
        'children' => [
            [
                'label' => 'Terima dari Grinding',
                'route' => 'mixing.receive',
                'active' => 'mixing.receive',
            ],
            [
                'label' => 'Batch Mixing – Daftar',
                'route' => 'mixing.batch.index',
                'active' => 'mixing.batch.index',
            ],
            [
                'label' => 'Batch Mixing – Buat',
                'route' => 'mixing.batch.create',
                'active' => 'mixing.batch.create',
            ],
            [
                'label' => 'Monitoring Mixing',
                'route' => 'mixing.monitoring',
                'active' => 'mixing.monitoring',
            ],
        ],
    ],
    [
        'label' => 'Packaging',
        'icon' => 'bx bx-package',
        'roles' => ['Packaging', 'Admin'],
        'children' => [
            [
                'label' => 'Terima dari Mixing',
                'route' => 'packaging.receive',
                'active' => 'packaging.receive',
            ],
            [
                'label' => 'TTPB',
                'route' => 'packaging.ttpb.create',
                'active' => 'packaging.ttpb.*',
            ],
            [
                'label' => 'Monitoring Packaging',
                'route' => 'packaging.monitoring',
                'active' => 'packaging.monitoring',
            ],
        ],
    ],
    [
        'label' => 'Finish Good',
        'icon' => 'bx bx-check-circle',
        'roles' => ['Finishgood', 'Admin'],
        'children' => [
            [
                'label' => 'Terima dari Packaging/Mixing',
                'route' => 'finishgood.receive',
                'active' => 'finishgood.receive',
            ],
            [
                'label' => 'Monitoring Finish Good',
                'route' => 'finishgood.monitoring',
                'active' => 'finishgood.monitoring',
            ],
        ],
    ],
    [
        'label' => 'Settings',
        'icon' => 'bx bx-cog',
        'roles' => ['Admin'],
        'children' => [
            [
                'label' => 'Profile',
                'route' => 'settings.profile',
                'active' => 'settings.profile',
            ],
            [
                'label' => 'Password',
                'route' => 'settings.password',
                'active' => 'settings.password',
            ],
        ],
    ],
];
