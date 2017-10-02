<?php

Breadcrumbs::register('home', function($breadcrumbs) {
    $breadcrumbs->push('Home', route('home'));
});

// staff
Breadcrumbs::register('staff.index', function($breadcrumbs) {
    $breadcrumbs->push('Dashborad', route('staff.index'));
});

Breadcrumbs::register('staff.menu.index', function($breadcrumbs) {
    $breadcrumbs->parent('staff.index');
    $breadcrumbs->push('Menu', route('staff.menu.index'));
});

Breadcrumbs::register('staff.ingredient.index', function($breadcrumbs){
    $breadcrumbs->parent('staff.index');
    $breadcrumbs->push('Ingredient', route('staff.ingredient.index'));
});

Breadcrumbs::register('staff.product.index', function($breadcrumbs){
    $breadcrumbs->parent('staff.index');
    $breadcrumbs->push('Product', route('staff.product.index'));
});

Breadcrumbs::register('staff.tafel.index', function($breadcrumbs){
    $breadcrumbs->parent('staff.index');
    $breadcrumbs->push('tafel', route('staff.tafel.index'));
});

Breadcrumbs::register('staff.user.index', function($breadcrumbs){
    $breadcrumbs->parent('staff.index');
    $breadcrumbs->push('User', route('staff.user.index'));
});

Breadcrumbs::register('staff.order.index', function($breadcrumbs) {
    $breadcrumbs->parent('staff.index');
    $breadcrumbs->push('Order', route('staff.order.index'));
});

Breadcrumbs::register('staff.kiosk.index', function($breadcrumbs) {
    $breadcrumbs->parent('staff.index');
    $breadcrumbs->push('kiosk', route('staff.kiosk.index'));
});

Breadcrumbs::register('staff.booking.index', function($breadcrumbs) {
    $breadcrumbs->parent('staff.index');
    $breadcrumbs->push('Booking', route('staff.booking.index'));
});
//end staff

//support
Breadcrumbs::register('support.index', function($breadcrumbs) {
    $breadcrumbs->push('Dashboard', route('support.index'));
});

//support pin
Breadcrumbs::register('support.pin.index', function($breadcrumbs) {
    $breadcrumbs->parent('support.index');
    $breadcrumbs->push('Pin', route('support.pin.index'));
});

//support kiosk
Breadcrumbs::register('support.kiosk.index', function($breadcrumbs) {
    $breadcrumbs->parent('support.index');
    $breadcrumbs->push('kiosk', route('support.kiosk.index'));
});

Breadcrumbs::register('support.kiosk.edit', function($breadcrumbs) {
    $breadcrumbs->parent('support.kiosk.index');
    $breadcrumbs->push('edit', route('support.kiosk.index'));
});

Breadcrumbs::register('support.kiosk.create', function($breadcrumbs) {
    $breadcrumbs->parent('support.kiosk.index');
    $breadcrumbs->push('create', route('support.kiosk.create'));
});
//support kiosk end

//support location
Breadcrumbs::register('support.location.index', function($breadcrumbs) {
    $breadcrumbs->parent('support.index');
    $breadcrumbs->push('Location', route('support.location.index'));
});

Breadcrumbs::register('support.location.edit', function($breadcrumbs) {
    $breadcrumbs->parent('support.location.index');
    $breadcrumbs->push('edit', route('support.location.index'));
});

Breadcrumbs::register('support.location.create', function($breadcrumbs) {
    $breadcrumbs->parent('support.location.index');
    $breadcrumbs->push('create', route('support.location.create'));
});
//support location


Breadcrumbs::register('support.ticket.index', function($breadcrumbs) {
    $breadcrumbs->parent('support.index');
    $breadcrumbs->push('Ticket', route('support.ticket.index'));
});
//end support


// Home > Blog > [Category]
//Breadcrumbs::register('category', function($breadcrumbs, $category)
//{
//    $breadcrumbs->parent('blog');
//    $breadcrumbs->push($category->title, route('category', $category->id));
//});
//
//// Home > Blog > [Category] > [Page]
//Breadcrumbs::register('page', function($breadcrumbs, $page)
//{
//    $breadcrumbs->parent('category', $page->category);
//    $breadcrumbs->push($page->title, route('page', $page->id));
//});