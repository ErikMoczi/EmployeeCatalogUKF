<?php

// Home
Breadcrumbs::register('admin.dashboard', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('admin.dashboard'));
});

// Home > Comment
Breadcrumbs::register('admin.comment.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Comment', route('admin.comment.index'));
});

// Home > Comment > Create
Breadcrumbs::register('admin.comment.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.comment.index');
    $breadcrumbs->push('Create', route('admin.comment.create'));
});

// Home > Comment > Edit
Breadcrumbs::register('admin.comment.edit', function ($breadcrumbs, $comment) {
    $breadcrumbs->parent('admin.comment.index');
    $breadcrumbs->push('Edit', route('admin.comment.edit', $comment));
});

// Home > Comment > Show
Breadcrumbs::register('admin.comment.show', function ($breadcrumbs, $comment) {
    $breadcrumbs->parent('admin.comment.index');
    $breadcrumbs->push('Show', route('admin.comment.show', $comment));
});

// Home > User
Breadcrumbs::register('admin.user.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('User', route('admin.user.index'));
});

// Home > User > Create
Breadcrumbs::register('admin.user.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.user.index');
    $breadcrumbs->push('Create', route('admin.user.create'));
});

// Home > User > Edit
Breadcrumbs::register('admin.user.edit', function ($breadcrumbs, $user) {
    $breadcrumbs->parent('admin.user.index');
    $breadcrumbs->push('Edit', route('admin.user.edit', $user));
});

// Home > User > Show
Breadcrumbs::register('admin.user.show', function ($breadcrumbs, $user) {
    $breadcrumbs->parent('admin.user.index');
    $breadcrumbs->push('Show', route('admin.user.show', $user));
});

// Home > User > Password
Breadcrumbs::register('admin.user.password', function ($breadcrumbs, $user) {
    $breadcrumbs->parent('admin.user.index');
    $breadcrumbs->push('Password', route('admin.user.password', $user));
});
