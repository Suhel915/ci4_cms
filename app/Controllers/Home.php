<?php

namespace App\Controllers;
use App\Models\Users;
use App\Models\ArticleModel;

class Home extends BaseController
{
    public function index()
    {
        $articleModel = new ArticleModel;
        $pager = \Config\Services::pager();
        $perPage = 10;
        $articles = $articleModel->where('status', 'publish')->paginate($perPage);
        return view('home',['articles' => $articles,'pager'=>$pager]);
    }
  
}
