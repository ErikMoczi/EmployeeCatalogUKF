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
