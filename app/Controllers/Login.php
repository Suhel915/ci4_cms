<?php
namespace App\Controllers;
use App\Models\Users;
use CodeIgniter\Controller;
use App\Config\Session;

class Login extends BaseController
{
    public function index()
    {
        $userModel = new Users();

        $email =  $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user =  $userModel->where('email',$email)->first();
        // var_dump($user);
    //    var_dump($password);
   
    if ($user && password_verify($password, $user['password'])) {

        session()->set('isLoggedIn', true);
        session()->set('id', $user['id']);  
        $_SESSION['name'] = $user['name'];
        $_SESSION['role'] = $user['role'];

        $userModel->updateUserActivity($user['id']);

        return redirect()->to('home');
    } 
       else
       {
        // return redirect()->to('home')->with('error', 'Invalid username or password');
       }
      return view('login');
    }
    public function logout()
    {
    
        session()->destroy();

        return redirect()->to('login');
    }

}
?>