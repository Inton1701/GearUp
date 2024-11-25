<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
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

$router->get('/admin', 'Dashboard::dashboard');
$router->get('/shop', 'Mainpage::shop');
$router->get('/contact', 'Mainpage::contact');
$router->get('/cart', 'Mainpage::cart');

$router->group('admin/products', function() use ($router) {
    $router->get('', 'Products::getList'); 
    $router->get('add-products', 'Products::add_product'); 
    $router->match('create', 'Products::create_product', ['POST', 'GET']); 
    $router->match('test', 'Products::test', ['POST', 'GET']); 
    $router->get('list', 'Products::list_products'); 
    $router->match('get/{id}', 'Products::get_product', ['POST', 'GET']); 
    $router->post('update', 'Products::update_product'); 
    $router->match('delete/{id}', 'Products::delete_product', ['POST', 'GET']); 
});

$router->group('admin/category', function() use ($router) {
    $router->get('', 'Category::category'); 
    $router->match('add', 'Category::add_category', ['POST', 'GET']); 
    $router->get('list', 'Category::category_list'); 
    $router->match('get/{id}', 'Category::get_category', ['POST', 'GET']); 
    $router->post('update', 'Category::update_category'); 
    $router->match('delete/{id}', 'Category::delete_category', ['POST', 'GET']); 
});