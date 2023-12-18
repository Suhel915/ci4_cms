<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{
    protected $table            = 'articles';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['title','content','status','user_id' ,'image'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = ['status' => 'required|in_list[publish, draft]' ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;


    public function searchArticles($search, $perPage)
    {
        
        return $this->like('title', $search)
                    ->orLike('content', $search)
                    ->paginate($perPage);
    }
    public function users()
    {
        return $this->belongsTo('App\Models\Users', 'user_id', 'id');
    }

}
