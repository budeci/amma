<?php
Admin::menu()->label('Catalog')->icon('fa-cubes')->items(function ()
{
    Admin::menu(Commerce\Productso\Models\PrsoCategory::class)->label('Categories')->icon('fa-cubes');
    Admin::menu(Commerce\Productso\Models\PrsoProduct::class)->label('Products')->icon('fa-list');
    Admin::menu(Commerce\Productso\Models\PrsoSeller::class)->label('Seller')->icon('fa-shopping-cart');
});
Admin::menu()->label('Users')->icon('fa-user')->items(function ()
{
    Admin::menu(App\Permit::class)->label('Privilege')->icon('fa-key');
    Admin::menu(App\Role::class)->label('Role')->icon('fa-graduation-cap');
    Admin::menu(App\User::class)->label('User')->icon('fa-user');
});

Admin::menu(App\Banner::class)->label('Banners')->icon('fa-file-image-o');
Admin::menu(App\Page::class)->label('Pages')->icon('fa-file');
Admin::menu(App\Blog::class)->label('Blog')->icon('fa-rss');
Admin::menu(App\Partener::class)->label('Parteners')->icon('fa-users');

Admin::menu()->label('System')->icon('fa-cogs')->items(function ()
{
    Admin::menu(App\Option::class)->label('Option')->icon('fa-tasks');
    Admin::menu(App\Language::class)->label('Languages')->icon('fa-globe');
    Admin::menu(App\Social::class)->label('Social')->icon('fa-globe');
    Admin::menu('translations')->label('Variable')->icon('fa-globe');
});
Admin::menu(Commerce\Productso\Models\PrsoProduct::class)->label('Products')->icon('fa-list')->items(function ()
{
    Admin::menu(App\Gender::class)->label('Gender')->icon('fa-cog');
    Admin::menu(App\Season::class)->label('Season')->icon('fa-cog');
});