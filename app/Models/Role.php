<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ID_ADMIN = 1;
    const ID_MODERATOR = 2;
    const ID_USER = 3;
}
