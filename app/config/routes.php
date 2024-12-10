<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');
/**
 * ------------------------------------------------------------------
 * LavaLust - an opensource lightweight PHP MVC Framework
 * ------------------------------------------------------------------
 *
 * MIT License
 *
 * Copyright (c) 2020 Ronald M. Marasigan
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package LavaLust
 * @author Ronald M. Marasigan <ronald.marasigan@yahoo.com>
 * @since Version 1
 * @link https://github.com/ronmarasigan/LavaLust
 * @license https://opensource.org/licenses/MIT MIT License
 */

/*
| -------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------
| Here is where you can register web routes for your application.
|
|
*/
$router->get('/', 'Auth::showLoginForm');
$router->get('/login', 'Auth::showLoginForm');
$router->post('/login', 'Auth::handleLogin');
$router->get('/register', 'Auth::showRegisterForm');
$router->post('/register', 'Auth::handleRegister');
$router->get('/logout', 'Auth::logout');

$router->get('/register', 'Auth::Register');

$router->post('/cart', 'Cart::add');
$router->get('/cart', 'Cart::view_cart');
$router->post('/cart/update', 'Cart::update_quantity');
$router->post('/cart/remove', 'Cart::remove');

$router->get('/admin', 'Dashboard::dashboard');
$router->get('/shop', 'Mainpage::shop');
$router->get('/contact', 'Mainpage::contact');
$router->get('/home', 'Mainpage::home');
$router->get('/build', 'Mainpage::build');

$router->get('/profile', 'Profile::profile');
$router->get('/profile/get_user_data', 'Profile::get_user_data');

$router->get('/view-product', 'Mainpage::view');
$router->get('/order', 'Mainpage::order');
$router->get('/wishlist', 'Mainpage::wishlist');


$router->group('admin/products', function () use ($router) {
    $router->get('', 'Products::getList');
    $router->get('add-products', 'Products::add_product');
    $router->match('create', 'Products::create_product', ['POST', 'GET']);
    $router->match('test', 'Products::test', ['POST', 'GET']);
    $router->get('list', 'Products::list_products');
    $router->match('get/{id}', 'Products::get_product', ['POST', 'GET']);
    $router->post('update', 'Products::update_product');
    $router->match('delete/{id}', 'Products::delete_product', ['POST', 'GET']);
    $router->get('view/{id}', 'Products::view_product'); 
    $router->get('view/{id}', 'Products::viewProduct');

});

$router->group('admin/category', function () use ($router) {
    $router->get('', 'Category::category');
    $router->match('add', 'Category::add_category', ['POST', 'GET']);
    $router->get('list', 'Category::category_list');
    $router->match('get/{id}', 'Category::get_category', ['POST', 'GET']);
    $router->post('update', 'Category::update_category');
    $router->match('delete/{id}', 'Category::delete_category', ['POST', 'GET']);
    $router->get('products/{id}', 'Category::get_products_by_category');
});

$router->group('admin/brand', function () use ($router) {
    $router->get('', 'Brand::brand');
    $router->match('add', 'Brand::add_brand', ['POST', 'GET']);
    $router->get('list', 'Brand::brand_list');
    $router->match('get/{id}', 'Brand::get_brand', ['POST', 'GET']);
    $router->post('update', 'Brand::update_brand');
    $router->match('delete/{id}', 'Brand::delete_brand', ['POST', 'GET']);
    $router->get('products/{id}', 'Brand::get_products_by_brand');
});

$router->group('admin/user', function () use ($router) {
    $router->get('', 'User::user');
    $router->match('add', 'User::add_user', ['POST', 'GET']);
    $router->get('list', 'User::user_list');
    $router->match('get/{id}', 'User::get_user', ['POST', 'GET']);
    $router->post('update', 'User::update_user');
    $router->match('delete/{id}', 'User::delete_user', ['POST', 'GET']);
});

$router->group('user', function () use ($router) {
    $router->get('', 'User::user');
    $router->match('register', 'User::register_user', ['POST', 'GET']);
    $router->get('login', 'User::login_user');
    $router->match('check_email', 'User::check_email', ['POST', 'GET']);
    $router->post('verify', 'User::verify_user');
    $router->match('delete/{id}', 'User::delete_user', ['POST', 'GET']);
});


$router->group('products', function () use ($router) {
    $router->get('fetch_products_by_category/{category}', 'Products::get_product_by_categories');
});
