<?php

namespace App\Enums;

enum OrganizationRole: string
{
    case Owner = 'owner';
    case Admin = 'admin';
    case Staff = 'staff';

    /**
     * @return list<string>
     */
    public static function catalogManagers(): array
    {
        return [self::Owner->value, self::Admin->value];
    }

    /**
     * @return list<string>
     */
    public static function adminViewers(): array
    {
        return [self::Owner->value, self::Admin->value, self::Staff->value];
    }
}
