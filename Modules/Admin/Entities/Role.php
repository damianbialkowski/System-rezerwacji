<?php

namespace Modules\Admin\Entities;

use Silber\Bouncer\Database\Role as BouncerRole;

class Role extends BouncerRole
{

    public static function getRoles()
    {
        return self::all();
    }

    public static function prepareRolesSelect()
    {
        $roles = self::getRoles();
        // TODO: find better option to prepare array
        $prepared_roles = [];
        foreach ($roles as $role) {
            $prepared_roles[$role->id] = $role->name;
        }
        return $prepared_roles;

    }

}