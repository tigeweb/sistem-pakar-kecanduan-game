<?php

namespace App\Permissions;

class Permission
{
    public const CAN_ACCESS_SUPERADMIN = 'akses_menu_superadmin';
    public const USERNAME_SUPERADMIN = 'superadmin';
    public const ROLE_SUPERADMIN = 'Super-Admin';

    public const CAN_ACCESS_ADMIN = 'akses_menu_admin';
    public const ROLE_ADMIN = 'Admin';


    // Superadmin
    public const VIEW_MANAGE_USERS = 'tampilan_manajemen_pengguna';
    public const CREATE_MANAGE_USERS = 'tambah_manajemen_pengguna';
    public const EDIT_MANAGE_USERS = 'ubah_manajemen_pengguna';
    public const DELETE_MANAGE_USERS = 'hapus_manajemen_pengguna';

    public const VIEW_ROLES = 'tampilan_roles';
    public const CREATE_ROLES = 'tambah_roles';
    public const EDIT_ROLES = 'ubah_roles';
    public const DELETE_ROLES = 'hapus_roles';

    public const VIEW_ROLE_PERMISSIONS = 'tampilan_izin_akses';
    public const CREATE_ROLE_PERMISSIONS = 'tambah_izin_akses';
    public const EDIT_ROLE_PERMISSIONS = 'ubah_izin_akses';
    public const DELETE_ROLE_PERMISSIONS = 'hapus_izin_akses';

    // Superadmin & Admin
    public const VIEW_CRUD = 'tampilan_crud';
    public const CREATE_CRUD = 'tambah_crud';
    public const EDIT_CRUD = 'ubah_crud';
    public const DETAIL_CRUD = 'detail_crud';
    public const DELETE_CRUD = 'hapus_crud';

    // Untuk seeder semua permission
    public const PERMISSION_GROUPS = [
        self::PERMISSION_GROUPS_ACCESS_SUPERADMIN,
        self::PERMISSION_GROUPS_ACCESS_ADMIN,
        self::PERMISSION_GROUPS_MANAGE_USERS,
        self::PERMISSION_GROUPS_ROLES,
        self::PERMISSION_GROUPS_ROLE_PERMISSIONS,
        self::PERMISSION_GROUPS_CRUD,
    ];

    // Untuk seeder role superadmin
    public const PERMISSION_GROUPS_SUPERADMIN = [
        self::PERMISSION_GROUPS_MANAGE_USERS,
        self::PERMISSION_GROUPS_ROLES,
        self::PERMISSION_GROUPS_ROLE_PERMISSIONS,
        self::PERMISSION_GROUPS_CRUD,
    ];

    // Untuk seeder role admin
    public const PERMISSION_GROUPS_ADMIN = [
        self::PERMISSION_GROUPS_CRUD,
    ];

    // Superadmin
    public const PERMISSION_GROUPS_ACCESS_SUPERADMIN = [
        'name' => self::CAN_ACCESS_SUPERADMIN,
        'permissions' => [
            self::CAN_ACCESS_SUPERADMIN,
        ]
    ];

    public const PERMISSION_GROUPS_MANAGE_USERS = [
        'name' => 'manajemen_pengguna',
        'permissions' => [
            self::VIEW_MANAGE_USERS,
            self::CREATE_MANAGE_USERS,
            self::EDIT_MANAGE_USERS,
            self::DELETE_MANAGE_USERS,
        ]
    ];

    public const PERMISSION_GROUPS_ROLES = [
        'name' => 'roles',
        'permissions' => [
            self::VIEW_ROLES,
            self::CREATE_ROLES,
            self::EDIT_ROLES,
            self::DELETE_ROLES,
        ]
    ];

    public const PERMISSION_GROUPS_ROLE_PERMISSIONS = [
        'name' => 'izin_akses',
        'permissions' => [
            self::VIEW_ROLE_PERMISSIONS,
            self::CREATE_ROLE_PERMISSIONS,
            self::EDIT_ROLE_PERMISSIONS,
            self::DELETE_ROLE_PERMISSIONS,
        ]
    ];
    // End Superadmin

    // Admin
    public const PERMISSION_GROUPS_ACCESS_ADMIN = [
        'name' => 'access_admin',
        'permissions' => [
            self::CAN_ACCESS_ADMIN,
        ]
    ];
    // End Admin

    // Superadmin & Admin
    public const PERMISSION_GROUPS_CRUD = [
        'name' => 'crud',
        'permissions' => [
            self::VIEW_CRUD,
            self::CREATE_CRUD,
            self::EDIT_CRUD,
            self::DETAIL_CRUD,
            self::DELETE_CRUD,
        ]
    ];
}
