<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
/**
 * Middleware: AuthMiddlewareMiddleware
 * 
 * Automatically generated via CLI.
 */


class AuthMiddleware {
    public function handle($request, $next) {
        if (empty($_SESSION['logged_in'])) {
            redirect('/login');
        }
        return $next($request);
    }
    }

