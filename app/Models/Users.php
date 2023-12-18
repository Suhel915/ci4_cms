<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $useSoftDeletes = false;

    protected $allowedFields = ['name', 'email', 'phone', 'address', 'username', 'role', 'password', 'created_at', 'last_activity'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = ['role' => 'required|in_list[admin,subscriber]'];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function searchUsers($search)
    {
        return $this->like('name', $search)
            ->orLike('email', $search)
            ->findAll();
    }
    public function articles()
    {
        return $this->hasMany('App\Models\ArticleModel', 'user_id', 'id');
    }
    public function updateUserActivity($userId)
    {
        $currentTime = date('Y-m-d H:i:s');

        $data = [
            'last_activity' => $currentTime
        ];

        if (!empty($data)) {
            $this->set($data)->where('id', $userId)->update();
        }
    }

    public function countActiveUsers()
    {
        $sessionTimeLimit = time() - (1 * 60); 

        $activeUsers = $this->db->table('users')
            ->where('last_activity >', date('Y-m-d H:i:s', $sessionTimeLimit))
            ->whereIn('role', ['admin', 'subscriber'])
            ->countAllResults();

        return $activeUsers;
    }


}
