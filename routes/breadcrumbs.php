<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push(trans('breadcrumbs.home'), route('home'));
});

// About
Breadcrumbs::for('pages', function ($trail, $page) {
    $trail->parent('home');
    $trail->push($page->name, route('pages', $page->id));
});

// Shops
Breadcrumbs::for('shops', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('menu.buy'), route('shops'));
});

// Contacts
Breadcrumbs::for('contact', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('breadcrumbs.contact'), route('contact'));
});

// Contacts
Breadcrumbs::for('breeders', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('breadcrumbs.breeder'), route('breeders'));
});

// Home > Product
Breadcrumbs::for('products', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('breadcrumbs.products'), route('product_catalog'));
});
//
//// Home > Каталог кормів
Breadcrumbs::for('catalog', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('breadcrumbs.products'), route('product_catalog'));
});

//// Home > Blog
Breadcrumbs::for('blog', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('breadcrumbs.blog'), route('blog'));
});

//// Home > Blog > [Post]
Breadcrumbs::for('post', function ($trail, $post) {
    $trail->parent('blog');
    $trail->push($post->name, route('post', $post->url));
});


//
//// Home > Blog > [Category]
Breadcrumbs::for('category', function ($trail, $category) {
    $trail->parent('catalog');
    $trail->push($category->name, route('category_url', $category->url));
});
//
// Home > Blog > [Category] > [Post]
Breadcrumbs::for('product', function ($trail, $post) {

    $category = $post->categories()->get()->all();
    if (count($category) > 0) {
        $trail->parent('category', $category[0]);
    }
    $trail->push($post->name, route('products_show', ['category'=>$category[0]->getAttribute('url'), 'url'=>$post->name]));
});