<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table = 'profile';
    protected $primaryKey = 'id'; // Assuming 'id' is the primary key
    protected $allowedFields = ['name', 'photo', 'about'];
}
