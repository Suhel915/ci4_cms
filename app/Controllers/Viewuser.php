<?php

namespace App\Controllers;

use App\Models\Users;
use App\Models\ArticleModel;
use App\Models\CommentTable;

class Viewuser extends BaseController
{
    public function __construct()
    {
        helper('session');
        $validationErrors = \Config\Services::validation();
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

    public function dashboard()
    {
        $userModel = new Users();
        $articleModel = new ArticleModel();
        $commentTable = new CommentTable();
        $userId = session()->get('id');
        

        $userModel->updateUserActivity($userId);
        

        $totalArticles = $articleModel->countAll();
        $totalUsers = $userModel->countAll();
        $totalPublish = $articleModel->where('status', 'publish')->countAllResults();
        $totalDraft = $articleModel->where('status', 'draft')->countAllResults();
        $totalSubscribers = $userModel->where('role', 'subscriber')->countAllResults();
        $totalAdmins = $userModel->where('role', 'admin')->countAllResults();
        $totalComments = $commentTable->countAll();
        $activeUsers = $userModel->countActiveUsers();
      

        $data = [
            'totalUsers' => $totalUsers,
            'totalArticles' => $totalArticles,
            'totalPublish' => $totalPublish,
            'totalDraft' => $totalDraft,
            'totalSubscribers' => $totalSubscribers,
            'totalAdmins' => $totalAdmins,
            'totalComments' => $totalComments,
            'activeUsers' => $activeUsers,
        ];
        return view('viewuser/dashboard', $data);
    }


    public function view()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('login');
        }
        $userModel = new Users();
        $articleModel = new ArticleModel();
        $pager = \Config\Services::pager();

        $totalArticles = $articleModel->countAll();
        $totalUsers = $userModel->countAll();
        $totalPublish = $articleModel->where('status', 'publish')->countAllResults();
        $totalDraft = $articleModel->where('status', 'draft')->countAllResults();
        $totalSubscribers = $userModel->where('role', 'subscriber')->countAllResults();
        $totalAdmins = $userModel->where('role', 'admin')->countAllResults();


        $search = $this->request->getGet('search');

        if (!empty($search)) {
            $data = [
                'users' => $userModel->searchUsers($search),
                'pager' => $pager,
                'search' => $search,
                'totalUsers' => $totalUsers,
                'totalArticles' => $totalArticles,
                'totalPublish' => $totalPublish,
                'totalDraft' => $totalDraft,
                'totalSubscribers' => $totalSubscribers,
                'totalAdmins' => $totalAdmins,
            ];
        } else {
            $data = [
                'users' => $userModel->paginate(10),
                'pager' => $pager,
                'search' => '',
                'totalUsers' => $totalUsers,
                'totalArticles' => $totalArticles,
                'totalPublish' => $totalPublish,
                'totalDraft' => $totalDraft,
                'totalSubscribers' => $totalSubscribers,
                'totalAdmins' => $totalAdmins,
            ];
        }
        return view('viewuser/view', $data);
    }

    public function searchUsers($search)
    {
        return $this->like('name', $search)
            ->orLike('email', $search)
            ->paginate(10);
    }

    public function view_user($id)
    {
        $userModel = new Users();
        $data['user'] = $userModel->find($id);
        return view('viewuser/view_user', $data);
    }

    public function edit_user($id)
    {
        $userModel = new users();
        $data['user'] = $userModel->find($id);

        return view('viewuser/edit_user', $data);
    }

    public function update_user($id)
    {
        $userModel = new users();

        $data['user'] = $userModel->find($id);
        $validationErrors = [];
        if ($this->request->getMethod() === 'post') {
            $data = [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'phone' => $this->request->getPost('phone'),
                'address' => $this->request->getPost('address'),
                'role' => $this->request->getPost('role')
            ];

            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $validationErrors['email'] = 'Invalid email address';
            }


            $data['phone'] = preg_replace('/\D/', '', $data['phone']);
            if (strlen($data['phone']) !== 10) {
                $validationErrors['phone'] = 'Invalid phone number';
            }


            if (!empty($validationErrors)) {
                return redirect()->back();

            }
            if (!empty($data['email'])) {
                $data['username'] = explode('@', $data['email'])[0];
            }


            $userModel->update($id, $data);
            return redirect()->to('users');
        }

        return view('users', ['validationErrors' => $validationErrors]);
    }


    public function delete($id)
    {
        $userModel = new Users();
        $userModel->delete($id);

        return redirect()->to('users');
    }

}
