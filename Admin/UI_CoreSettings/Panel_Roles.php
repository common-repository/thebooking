<?php

namespace TheBooking\Admin\UI_CoreSettings;

use TheBooking\TheBookingClass;

defined('ABSPATH') || exit;

class Panel_Roles
{
    public static function get_panel()
    {
        return [
            'panelRef'   => 'section-roles',
            'panelLabel' => __('Roles and permissions', 'thebooking'),
            'blocks'     => [
                [
                    'title'       => __('Roles allowed to be plugin administrators', 'thebooking'),
                    'description' => __('Select the WordPress roles that are supposed to fully manage the plugin. If you want a specific role for that (e.g. Booking Admin), create it with a role management plugin.', 'thebooking'),
                    'components'  => [
                        [
                            'settingId' => 'admin_roles',
                            'type'      => 'checkboxes',
                            'options'   => self::_admin_roles()
                        ],
                        [
                            'type' => 'notice',
                            'text' => __('Administrators are always allowed.', 'thebooking')
                        ]
                    ]
                ]
            ]
        ];
    }

    protected static function _admin_roles()
    {
        $roles = [];
        foreach (wp_roles()->roles as $name => $role) {
            if ($name === 'administrator') {
                continue;
            }
            $roles[] = [
                'label' => $role['name'],
                'value' => $name,
            ];
        }

        return apply_filters('tbk_backend_core_admin_roles', $roles);
    }
}