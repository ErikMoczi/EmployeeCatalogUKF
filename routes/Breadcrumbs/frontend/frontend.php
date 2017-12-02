<?php

// Home
Breadcrumbs::register('frontend.home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('frontend.home'));
});

// Home > Employees
Breadcrumbs::register('frontend.employee.index', function ($breadcrumbs) {
    $breadcrumbs->parent('frontend.home');
    $breadcrumbs->push('Employees', route('frontend.employee.index'));
});

// Home > Employees > Details
Breadcrumbs::register('frontend.employee.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('frontend.employee.index');
    $breadcrumbs->push('Details', route('frontend.employee.show', $id));
});

// Home > Publications
Breadcrumbs::register('frontend.publication.index', function ($breadcrumbs) {
    $breadcrumbs->parent('frontend.home');
    $breadcrumbs->push('Publications', route('frontend.publication.index'));
});

// Home > Publications > Details
Breadcrumbs::register('frontend.publication.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('frontend.publication.index');
    $breadcrumbs->push('Details', route('frontend.publication.show', $id));
});

// Home > Projects
Breadcrumbs::register('frontend.project.index', function ($breadcrumbs) {
    $breadcrumbs->parent('frontend.home');
    $breadcrumbs->push('Projects', route('frontend.project.index'));
});

// Home > Projects > Details
Breadcrumbs::register('frontend.project.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('frontend.project.index');
    $breadcrumbs->push('Details', route('frontend.project.show', $id));
});

// Home > Activities
Breadcrumbs::register('frontend.activity.index', function ($breadcrumbs) {
    $breadcrumbs->parent('frontend.home');
    $breadcrumbs->push('Activities', route('frontend.activity.index'));
});

// Home > Activities > Details
Breadcrumbs::register('frontend.activity.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('frontend.activity.index');
    $breadcrumbs->push('Details', route('frontend.activity.show', $id));
});

// Home > Positions
Breadcrumbs::register('frontend.position.index', function ($breadcrumbs) {
    $breadcrumbs->parent('frontend.home');
    $breadcrumbs->push('Positions', route('frontend.position.index'));
});

// Home > Positions > Details
Breadcrumbs::register('frontend.position.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('frontend.position.index');
    $breadcrumbs->push('Details', route('frontend.position.show', $id));
});

// Home > Departments
Breadcrumbs::register('frontend.department.index', function ($breadcrumbs) {
    $breadcrumbs->parent('frontend.home');
    $breadcrumbs->push('Departments', route('frontend.department.index'));
});

// Home > Departments > Details
Breadcrumbs::register('frontend.department.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('frontend.department.index');
    $breadcrumbs->push('Details', route('frontend.department.show', $id));
});

// Home > Faculties
Breadcrumbs::register('frontend.faculty.index', function ($breadcrumbs) {
    $breadcrumbs->parent('frontend.home');
    $breadcrumbs->push('Faculties', route('frontend.faculty.index'));
});

// Home > Faculties > Details
Breadcrumbs::register('frontend.faculty.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('frontend.faculty.index');
    $breadcrumbs->push('Details', route('frontend.faculty.show', $id));
});

// Home > Statistics
Breadcrumbs::register('frontend.statistics.index', function ($breadcrumbs) {
    $breadcrumbs->parent('frontend.home');
    $breadcrumbs->push('Statistics', route('frontend.statistics.index'));
});

// Home > Statistics > Employees
Breadcrumbs::register('frontend.statistics.employee', function ($breadcrumbs) {
    $breadcrumbs->parent('frontend.statistics.index');
    $breadcrumbs->push('Employees', route('frontend.statistics.employee'));
});

// Home > Statistics > Publications
Breadcrumbs::register('frontend.statistics.publication', function ($breadcrumbs) {
    $breadcrumbs->parent('frontend.statistics.index');
    $breadcrumbs->push('Publications', route('frontend.statistics.publication'));
});

// Home > Statistics > Projects
Breadcrumbs::register('frontend.statistics.project', function ($breadcrumbs) {
    $breadcrumbs->parent('frontend.statistics.index');
    $breadcrumbs->push('Projects', route('frontend.statistics.project'));
});

// Home > Statistics > Activities
Breadcrumbs::register('frontend.statistics.activity', function ($breadcrumbs) {
    $breadcrumbs->parent('frontend.statistics.index');
    $breadcrumbs->push('Activities', route('frontend.statistics.activity'));
});

// Home > Statistics > Faculties
Breadcrumbs::register('frontend.statistics.faculty', function ($breadcrumbs) {
    $breadcrumbs->parent('frontend.statistics.index');
    $breadcrumbs->push('Faculties', route('frontend.statistics.faculty'));
});

// Home > Search
Breadcrumbs::register('frontend.search.index', function ($breadcrumbs) {
    $breadcrumbs->parent('frontend.home');
    $breadcrumbs->push('Search', route('frontend.search.index'));
});
