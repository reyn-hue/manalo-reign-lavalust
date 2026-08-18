<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentMiddleware
{
    public function handle($request, $next)
    {
        if (isset($_SESSION['student_access']) && $_SESSION['student_access'] === true) {
            return $next($request);
        } 
        else {
             $_SESSION['error_message'] = "Access denied. You are not allowed to view the student profile.";
            header("Location: " . site_url('/student'));
            exit;

        }

    }
}