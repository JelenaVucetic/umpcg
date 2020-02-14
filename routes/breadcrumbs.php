<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Naslovna', route('home'));
});

// Home > About
Breadcrumbs::register('about', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('O nama', route('about'));
});

// Home > Blog
Breadcrumbs::register('become_member', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Postani član', route('become_member'));
});

Breadcrumbs::register('members', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Članovi', route('members'));
});

Breadcrumbs::register('projects', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Projekti i aktivnosi', route('projects'));
});


// Home > Blog > [Category]
Breadcrumbs::register('post', function($breadcrumbs, $posts)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push($post->title, route('posts.show', $post));
});
