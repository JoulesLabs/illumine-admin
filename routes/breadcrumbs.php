<?php

// Home
Breadcrumbs::for('admin::home', function ($trail) {
    $trail->push('Home');
});

// Users breadcrumbs
Breadcrumbs::for('admin::user.index', function ($trail) {
    $trail->push('Users');
});

Breadcrumbs::for('admin::user.create', function ($trail) {
    $trail->push('Users', route('admin::user.index'));
    $trail->push('Create');
});

Breadcrumbs::for('admin::user.edit', function ($trail) {
    $trail->push('Users', route('admin::user.index'));
    $trail->push('Edit');
});

Breadcrumbs::for('admin::user.change_password_page', function ($trail) {
    $trail->push('Password Change');
});

Breadcrumbs::for('admin::role.index', function ($trail) {
    $trail->push('Roles');
});

Breadcrumbs::for('admin::role.create', function ($trail) {
    $trail->push('Roles', route('admin::role.index'));
    $trail->push('Create');
});

Breadcrumbs::for('admin::role.edit', function ($trail) {
    $trail->push('Roles', route('admin::role.index'));
    $trail->push('Edit');
});

//Customer breadcrumbs
Breadcrumbs::for('admin::customer.index', function ($trail) {
    $trail->push('Customers');
});

Breadcrumbs::for('admin::customer.create', function ($trail) {
    $trail->push('Customers', route('admin::customer.index'));
    $trail->push('Create');
});

Breadcrumbs::for('admin::customer.show', function ($trail) {
    $trail->push('Customers', route('admin::customer.index'));
    $trail->push('Show');
});

Breadcrumbs::for('admin::customer.edit', function ($trail) {
    $trail->push('Customers', route('admin::customer.index'));
    $trail->push('Edit');
});

Breadcrumbs::for('admin::customer.trading_accounts', function ($trail) {
    $trail->push('Customers', route('admin::customer.index'));
    $trail->push('Trading Accounts');
});

Breadcrumbs::for('admin::customer.consistency-cycle', function ($trail) {
    $trail->push('Customers', route('admin::customer.index'));
    $trail->push('Consistency Cycles');
});

Breadcrumbs::for('admin::customer.trading-cycle', function ($trail) {
    $trail->push('Customers', route('admin::customer.index'));
    $trail->push('Trading Cycles');
});

//Subscription
Breadcrumbs::for('admin::subscription.index', function ($trail) {
    $trail->push('Subscriptions');
});


//Plan breadcrumbs
Breadcrumbs::for('admin::plan.index', function ($trail) {
    $trail->push('Plans');
});

Breadcrumbs::for('admin::plan.create', function ($trail) {
    $trail->push('Plans', route('admin::plan.index'));
    $trail->push('Create');
});

Breadcrumbs::for('admin::plan.edit', function ($trail) {
    $trail->push('Plans', route('admin::plan.index'));
    $trail->push('Edit');
});

//Utility breadcrumbs
Breadcrumbs::for('admin::utility.index', function ($trail) {
    $trail->push('Utilities');
});

Breadcrumbs::for('admin::utility.create', function ($trail) {
    $trail->push('Utilites', route('admin::utility.index'));
    $trail->push('Create');
});

Breadcrumbs::for('admin::utility.edit', function ($trail) {
    $trail->push('Utilities', route('admin::utility.index'));
    $trail->push('Edit');
});


//Utility Category breadcrumbs
Breadcrumbs::for('admin::utility_category.index', function ($trail) {
    $trail->push('Utility Categories');
});

Breadcrumbs::for('admin::utility_category.create', function ($trail) {
    $trail->push('Utility Categories', route('admin::utility_category.index'));
    $trail->push('Create');
});

Breadcrumbs::for('admin::utility_category.edit', function ($trail) {
    $trail->push('Utility Categories', route('admin::utility_category.index'));
    $trail->push('Edit');
});


//Trading Account breadcrumbs
Breadcrumbs::for('admin::trading_account.index', function ($trail) {
    $trail->push('Trading Accounts');
});

Breadcrumbs::for('admin::trading_account.create', function ($trail) {
    $trail->push('Trading Accounts', route('admin::trading_account.index'));
    $trail->push('Create');
});

Breadcrumbs::for('admin::trading_account.edit', function ($trail) {
    $trail->push('Trading Accounts', route('admin::trading_account.index'));
    $trail->push('Edit');
});

Breadcrumbs::for('admin::trading_account.consistency-cycle', function ($trail) {
    $trail->push('Trading Accounts', route('admin::trading_account.index'));
    $trail->push('Consistency Cycles');
});

Breadcrumbs::for('admin::trading_account.trading-cycle', function ($trail) {
    $trail->push('Trading Accounts', route('admin::trading_account.index'));
    $trail->push('Trading Cycles');
});


//Payout breadcrumbs
Breadcrumbs::for('admin::payout.index', function ($trail) {
    $trail->push('Payouts');
});

//Wallet breadcrumbs
Breadcrumbs::for('admin::wallet.index', function ($trail) {
    $trail->push('Wallets');
});

//Trading Account Request breadcrumbs
Breadcrumbs::for('admin::trading_account_request.index', function ($trail) {
    $trail->push('Top-up & Resets');
});

//Subscription breadcrumbs
Breadcrumbs::for('admin::subscription.create', function ($trail) {
    $trail->push('Customers', route('admin::customer.index'));
    $trail->push('Subscription');
});

Breadcrumbs::for('admin::customer.subscription', function ($trail) {
    $trail->push('Customers', route('admin::customer.index'));
    $trail->push('Cancel Subscription');
});

//Marketing breadcrumbs
Breadcrumbs::for('admin::marketing.index', function ($trail) {
    $trail->push('Customers');
});

Breadcrumbs::for('admin::marketing.abundant_cart', function ($trail) {
    $trail->push('Abundant Carts');
});

//Task breadcrumbs
Breadcrumbs::for('admin::task.execution', function ($trail) {
    $trail->push('Execution');
});

//Setting breadcrumbs
Breadcrumbs::for('admin::setting.edit', function ($trail) {
    $trail->push('Edit');
});

Breadcrumbs::for('admin::setting.on_board_page', function ($trail) {
    $trail->push('Create');
});

Breadcrumbs::for('admin::manager.create', function ($trail) {
    $trail->push('Create');
});

Breadcrumbs::for('admin::manager.index', function ($trail) {
    $trail->push('Account Manager');
});
