<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use App\Models\Users;
use App\Models\CommentTable;

class Articles extends BaseController
{
    public function index()
    {
        $articleModel = new ArticleModel;
        $articles = $articleModel->findAll();
        $pager = \Config\Services::pager();
        $perPage = 10;
        $userId = $_SESSION['id'] ?? null;

        if (!empty($search)) {
            $articles = $articleModel->searchUserArticles($search, $perPage, $userId);
        } else {
            $articles = $articleModel->where('user_id', $userId)->paginate($perPage);
        }

        return view('articles/display', ['articles' => $articles]);
    }

    public function view_all_articles()
    {
        $articleModel = new ArticleModel();
        $pager = \Config\Services::pager();
        $perPage = 10;
        $search = $this->request->getGet('search');
        $query = $articleModel->builder();

        $userRole = $_SESSION['role'] ?? null;

        if ($userRole === 'admin') {
            if (!empty($search)) {
                $articles = $articleModel->searchArticles($search, $perPage);
            } else {
                $articles = $articleModel->paginate($perPage);
            }
        } else {
            $userId = $_SESSION['id'] ?? null;

            if (!empty($search)) {
                $articles = $articleModel->searchUserArticles($search, $perPage, $userId);
            } else {
                $articles = $articleModel->where('user_id', $userId)->paginate($perPage);
            }
        }

        $data = [
            'articles' => $articles,
            'pager' => $articleModel->pager,
            'search' => $search,
        ];

        return view('articles/view_all_articles', $data);
    }



    public function show($id)
    {
        // $articleModel = new ArticleModel;
        // $commentTable = new commentTable;
        // $article = $articleModel->find($id);
        // return view('articles/show',['article'=>$article, 'articleId' => $id]);
        $articleModel = new ArticleModel();
        $commentTable = new CommentTable();

        $article = $articleModel->find($id);
        $comments = $commentTable->where('article_id', $id)->findAll();

        return view('articles/show', [
            'articleId' => $id,
            'article' => $article,
            'comments' => $comments
        ]);
    }

    public function new()
    {
        $userId = session()->get('id');
        if ($this->request->getMethod() === 'post') {
            $title = $this->request->getVar('title');
            $content = $this->request->getVar('content');
            $status = $this->request->getVar('status');
            $image = $this->request->getFile('image');
            if ($image && $image->isValid() && $image->getMimeType() && strpos($image->getMimeType(), 'image/') === 0) {
                $imageName = $image->getRandomName();
                $image->move('public/uploads/', $imageName);
            } else {

                $imageName = 'No';
            }




            $data = [
                'title' => $title,
                'content' => $content,
                'status' => $status,
                'user_id' => $userId,
                'image' => $imageName,

            ];

            if (empty($title)) {
                return redirect()->back();
            }

            $articleModel = new ArticleModel;
            $articleModel->insert($data);
            return redirect()->to('articles');
        }
        return view('articles/new');
    }

    public function edit($id)
    {
        $articleModel = new ArticleModel;
        $article = $articleModel->find($id);
        return view('articles/edit', ['article' => $article]);
    }

    public function update($id)
    {
        $articleModel = new ArticleModel;
        $data['article'] = $articleModel->find($id);

        if ($this->request->getMethod() === 'post') {
            $data = [
                'title' => $this->request->getPost('title'),
                'content' => $this->request->getPost('content'),
                'status' => $this->request->getVar('status'),

            ];
            $image = $this->request->getFile('image');
            if ($image && $image->isValid() && $image->getMimeType() && strpos($image->getMimeType(), 'image/') === 0) {
                $imageName = $image->getRandomName();
                $image->move('public/uploads/', $imageName);
                $data['image'] = $imageName;
            } 
            $articleModel->update($id, $data);
            return redirect()->to('articles');
        }
        return view('articles/edit', ['article' => $article]);

    }

    public function delete($id)
    {
        $articleModel = new ArticleModel();
        $commentTable = new CommentTable();

        $commentTable->where('article_id', $id)->delete();
        $articleModel->delete($id);

        return redirect()->to('articles');
    }

    public function comment($articleId)
    {
        $userId = session()->get('id');

        if ($userId) {
            $articleModel = new ArticleModel();
            $article = $articleModel->find($articleId);

            if ($article) {
                $commentTable = new CommentTable();
                if ($this->request->getMethod() === 'post') {
                    $data = [
                        'email' => $this->request->getPost('email'),
                        'feedback' => $this->request->getPost('feedback'),
                        'user_id' => $userId,
                        'article_id' => $articleId,
                    ];

                    $commentTable->insert($data);
                }

                return redirect()->back();
            }
        }

        return redirect()->to('articles');
    }

    public function showComment($articleId)
    {
        $articleModel = new ArticleModel();
        $commentTable = new CommentTable();
        $article = $articleModel->find($articleId);
        $comments = $commentTable->where('article_id', $articleId)->findAll();

        return view('articles/showComment', ['articleId' => $articleId, 'comments' => $comments]);
    }

    public function view_all_comments()
    {
        $commentTable = new CommentTable();
        $articleModel = new ArticleModel();

        $search = $this->request->getGet('search');
        $pager = \Config\Services::pager();
        $perPage = 10;


        $comments = !empty($search)
            ? $commentTable->like('email', $search)->orLike('feedback', $search)->paginate($perPage)
            : $commentTable->paginate($perPage);

        foreach ($comments as &$comment) {
            $articleId = $comment['article_id'];
            $article = $articleModel->find($articleId);
            $comment['article'] = $article;
        }

        $data = [
            'comments' => $comments,
            'pager' => $commentTable->pager,
            'search' => $search

        ];

        return view('articles/view_all_comments', $data);
    }

    public function delete_comment($commentId)
    {
        $commentTable = new CommentTable();
        $comment = $commentTable->find($commentId);
        if (!$comment) {
            return redirect()->to('articles/view_all_comments')->with('error', 'Comment not found');
        }
        $commentTable->delete($commentId);
        return redirect()->to('articles/view_all_comments')->with('success', 'Comment deleted successfully');
    }


}
?>