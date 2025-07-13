<?php

namespace App\Enums;

enum UserRole: string
{
    case User = 'user';
    case Admin = 'admin';
    case Faculty = 'faculty';
    case Agency = 'agency';
}
