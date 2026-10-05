<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthController extends Controller {
    public function __construct() {
        parent::__construct();
        $this->call->model('UserModel');
        $this->call->library('auth');
    }

    // Show login page
    public function showLogin() {
        $this->call->view('login');
    }

    // Show signup page
    public function showSignup() {
        $this->call->view('signup');
    }

    // Handle login
    public function login() {
        $email = $this->request->post('email');
        $password = $this->request->post('password');

        $this->call->database();
        $user = $this->UserModel->findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            $this->auth->login($user['id']);
            redirect('/products'); // go to products after login
        } else {
            http_response_code(401);
            echo 'Invalid credentials';
        }
    }

    // Handle signup
    public function signup() {
        $username = $this->request->post('username');
        $email    = $this->request->post('email');
        $password = $this->request->post('password');

        // Hash the password before saving
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $data = [
            'username' => $username,
            'email'    => $email,
            'password' => $hashedPassword,
            'role'     => 'user',
            'is_active'=> 1
        ];

        $this->call->database();
        $this->UserModel->create($data);

        // After signup, redirect to login page
        redirect('/login');
    }

    // Handle logout
    public function logout() {
        $this->auth->logout();
        redirect('/'); // back to signup page
    }
}
