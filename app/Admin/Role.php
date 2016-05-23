<?php

Admin::model('App\Role')->title('Роли пользователей')->display(function ()
{
 $display = AdminDisplay::datatables();
 $display->with();
 $display->filters([

 ]);
 $display->columns([
 Column::string('name')->label('Role name'),
 Column::string('slug')->label('Role'),
 ]);
 return $display;
})->createAndEdit(function ($id)
{
 $form = AdminForm::form();
 if ( in_array($id, [1,2,3])) {
 $form->items([
 FormItem::text('name', 'Role name'),
 FormItem::text('slug', 'Role')->readonly(),
 FormItem::multiselect('permits', 'Permissions')->model('App\Permit')->display('name'),
 ]);
 }
 else {
 $form->items([
 FormItem::text('name', 'Role name'),
 FormItem::text('slug', 'Роль'),
 FormItem::multiselect('permits', 'Permissions')->model('App\Permit')->display('name'),
 ]);
 }
 return $form;
})->delete(function ($id) { if ( in_array($id, [1,2,3])) return null; else return 1; });