<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    */

    'title' => 'Sistem Penggajian',
    'title_prefix' => '',
    'title_postfix' => '',


    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    */

    'logo' => '<b>Sistem</b> Penggajian',
    'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_alt' => 'Logo',


    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    */

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_desc' => 'Administrator',


    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    */

    'layout_topnav' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => true,
    'layout_fixed_footer' => false,


    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    */

    'sidebar_mini' => false,
    'sidebar_collapse' => false,
    'sidebar_nav_accordion' => true,
    'sidebar_user_panel' => true,
    'sidebar_search' => false,


    /*
    |--------------------------------------------------------------------------
    | Menu
    |--------------------------------------------------------------------------
    */

    'menu' => [


        [
            'text'  => 'Dashboard',
            'route' => 'dashboard',
            'icon'  => 'fas fa-tachometer-alt',
        ],



        [
            'header' => 'MASTER DATA',
        ],


        [
            'text'  => 'Jabatan',
            'route' => 'jabatans.index',
            'icon'  => 'fas fa-briefcase',
        ],


        [
            'text'  => 'Karyawan',
            'route' => 'karyawans.index',
            'icon'  => 'fas fa-users',
        ],


        [
            'text'  => 'Absensi',
            'route' => 'absensis.index',
            'icon'  => 'fas fa-user-check',
        ],




        [
            'header' => 'TRANSAKSI',
        ],


        [
            'text'  => 'Penggajian',
            'route' => 'penggajians.index',
            'icon'  => 'fas fa-money-bill-wave',
        ],


        [
            'text'  => 'Slip Gaji',
            'route' => 'penggajians.index',
            'icon'  => 'fas fa-file-invoice-dollar',
        ],




        [
            'header' => 'LAPORAN',
        ],


        [
            'text'  => 'Laporan Absensi',
            'route' => 'laporan.absensi',
            'icon'  => 'fas fa-calendar-check',
        ],


        [
            'text'  => 'Laporan Penggajian',
            'route' => 'laporan.penggajian',
            'icon'  => 'fas fa-chart-line',
        ],




        [
            'header' => 'PENGATURAN',
        ],


        [
            'text'  => 'Profil',
            'route' => 'profile.edit',
            'icon'  => 'fas fa-user-circle',
        ],


    ],




    /*
    |--------------------------------------------------------------------------
    | Filters
    |--------------------------------------------------------------------------
    */

    'filters' => [

        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,

        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,

        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,

        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,

        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,

        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,

        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,

    ],


];