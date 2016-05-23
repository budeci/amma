<?php

Admin::model('App\Language')->title('Languges')->display(function ()
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
		FormItem::text('name', 'Name'),
		FormItem::text('code', 'Code'),
		FormItem::text('image', 'Image'),
		FormItem::checkbox('show', 'Show')->defaultValue(1),
		//FormItem::text('sort_order', 'Sort Order')->defaultValue(0),
	]);
	return $form;
});