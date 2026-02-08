<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::index');
$routes->get('signup', 'Signup::index');
$routes->post('signup/register', 'Signup::register');
$routes->get('login', 'Auth::index');
$routes->post('auth/login', 'Auth::login');
$routes->get('logout', 'Auth::logout');
$routes->get('dashboard', 'Dashboard::index');
$routes->get('chat', 'Chat::index');
$routes->post('chat/send', 'Chat::send');
$routes->get('chat/getMessages/(:num)', 'Chat::getMessages/$1');
$routes->get('chat/getUsers', 'Chat::getUsers');

// Forgot Password Routes
$routes->group('forgot-password', function ($routes) {
    $routes->get('/', 'ForgotPassword::index');
    $routes->post('send-otp', 'ForgotPassword::sendOtp');
    $routes->get('verify-otp', 'ForgotPassword::verifyOtp');
    $routes->post('validate-otp', 'ForgotPassword::validateOtp');
    $routes->get('reset-password', 'ForgotPassword::resetPassword');
    $routes->post('update-password', 'ForgotPassword::updatePassword');
});
