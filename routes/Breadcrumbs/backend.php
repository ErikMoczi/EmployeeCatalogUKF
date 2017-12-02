<?php

// Home
Breadcrumbs::register('admin.dashboard', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('admin.dashboard'));
});
