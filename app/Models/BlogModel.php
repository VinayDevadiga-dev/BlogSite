<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table = 'blogs';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'bio', 'about', 'photo_path', 'uploaded_by', 'created_at'];
    
    // Disable soft deletes by setting it to false
    protected $useSoftDeletes = false;
}
