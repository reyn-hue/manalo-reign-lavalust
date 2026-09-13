<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: AuthController
 * 
 * Automatically generated via CLI.
 */




class AuthController extends Controller {
    public function login() {
        return $this->call->view('login');
    }

    public function authenticate() {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username === 'admin' && $password === '1234') {
            $_SESSION['logged_in'] = true;
            redirect('/products');
        } else {
            echo "Invalid credentials";
        }
    }

    public function logout() {
        session_destroy();
        redirect('/login');
    }
}