<?php
namespace App\Controllers;
use App\Models\Users;

class Register extends BaseController
{
    public function index()
    {
    
        if ($this->request->getMethod() === 'post') {
            $validationErrors = [];

            $name = $this->request->getVar('name');
            $email = $this->request->getVar('email');
            $phone = $this->request->getVar('phone');
            $address = $this->request->getVar('address');
            $username = explode('@', $email)[0];
            $created_at = $this->request->getVar('created_at');
            $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
            $defaultRole = 'subscriber';


            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $validationErrors['email'] = 'Invalid email address';
               
            }

   
            $phone = preg_replace('/\D/', '', $phone);
            if (strlen($phone) !== 10) {
                $validationErrors['phone'] = 'Invalid phone number';
            }

           
            if (!empty($validationErrors)) {
                return view('register', ['validationErrors' => $validationErrors]);
            }
           

            $data = [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'address' => $address,
                'username' => $username,
                'created_at' => $created_at,
                'password' => $password ,
                'role' => $defaultRole
            ];
            $userModel = new Users();
            if ($userModel->insert($data)) {
                return redirect()->to('login')->with('message', 'Registration Successful');
            } else {   
                return redirect()->back()->withInput()->with('error', 'Failed to register');
            }

        }
       
        return view('register');
    }
}
?>