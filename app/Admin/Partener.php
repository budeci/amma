<?php

Admin::model('App\Partener')->title('Parteners')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('name')->label('Name'),
		Column::image('image')->label('Image'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('name', 'Name')->required(),
		FormItem::image('image', 'Image'),
		FormItem::text('link', 'Link'),
	]);
	return $form;
});