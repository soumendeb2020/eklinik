<?php

namespace App;

class Permission extends \Spatie\Permission\Models\Permission
{
    public static function defaultPermissions()
    {
        return [
            'view_users',
            'add_users',
            'edit_users',
            'delete_users',

            'view_roles',
            'add_roles',
            'edit_roles',
            'delete_roles',

            'view_posts',
            'add_posts',
            'edit_posts',
            'delete_posts',

            'view_consultation',
            'add_consultation',
            'edit_consultation',
            'delete_consultation',

            'view_laboratory',
            'add_laboratory',
            'edit_laboratory',
            'delete_laboratory',

            'view_dispensary',
            'add_dispensary',
            'edit_dispensary',
            'delete_dispensary',

            'view_ty2',
            'add_ty2',
            'edit_ty2',
            'delete_ty2',

            'view_inventory',
            'add_inventory',
            'edit_inventory',
            'delete_inventory',

            'view_queue',
            'add_queue',
            'edit_queue',
            'delete_queue',

            'view_queue',
            'add_queue',
            'edit_queue',
            'delete_queue',
            
            'add_mc',          
            'edit_mc',
            'approve_mc',
            'delete_mc',
            
            'add_timeslip',
            'edit_timeslip',
            'approve_timeslip',
            'delete_timeslip',
            
            'view_report',
            'view_setting',
            'can_print_timeslip',
            'can_print_mc',

        ];
    }
}
