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
    public const VIEW_MANAGE_USERS = 'tampilan_manage_users';
    public const CREATE_MANAGE_USERS = 'tambah_manage_users';
    public const EDIT_MANAGE_USERS = 'ubah_manage_users';
    public const DELETE_MANAGE_USERS = 'hapus_manage_users';

    public const VIEW_ROLES = 'tampilan_roles';
    public const CREATE_ROLES = 'tambah_roles';
    public const EDIT_ROLES = 'ubah_roles';
    public const DELETE_ROLES = 'hapus_roles';

    public const VIEW_ROLES_PERMISSIONS = 'tampilan_izin_akses';
    public const CREATE_ROLES_PERMISSIONS = 'tambah_izin_akses';
    public const EDIT_ROLES_PERMISSIONS = 'ubah_izin_akses';
    public const DELETE_ROLES_PERMISSIONS = 'hapus_izin_akses';

    // Untuk seeder semua permission
    public const PERMISSION_GROUPS = [
        self::PERMISSION_GROUPS_ACCESS_SUPERADMIN,
        self::PERMISSION_GROUPS_ACCESS_ADMIN,
        self::PERMISSION_GROUPS_MANAGE_USERS,
        self::PERMISSION_GROUPS_ROLES,
        self::PERMISSION_GROUPS_ROLES_PERMISSIONS,
    ];

    // Untuk seeder role superadmin
    public const PERMISSION_GROUPS_SUPERADMIN = [
        self::PERMISSION_GROUPS_ACCESS_SUPERADMIN,
        self::PERMISSION_GROUPS_MANAGE_USERS,
        self::PERMISSION_GROUPS_ROLES,
        self::PERMISSION_GROUPS_ROLES_PERMISSIONS,
    ];

    // Untuk seeder role admin
    public const PERMISSION_GROUPS_ADMIN = [
        self::PERMISSION_GROUPS_ACCESS_ADMIN,
    ];

    // Superadmin
    public const PERMISSION_GROUPS_ACCESS_SUPERADMIN = [
        'name' => self::CAN_ACCESS_SUPERADMIN,
        'permissions' => [
            self::CAN_ACCESS_SUPERADMIN,
        ]
    ];

    public const PERMISSION_GROUPS_MANAGE_USERS = [
        'name' => 'manage_users',
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

    public const PERMISSION_GROUPS_ROLES_PERMISSIONS = [
        'name' => 'roles_permissions',
        'permissions' => [
            self::VIEW_ROLES_PERMISSIONS,
            self::CREATE_ROLES_PERMISSIONS,
            self::EDIT_ROLES_PERMISSIONS,
            self::DELETE_ROLES_PERMISSIONS,
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
}
