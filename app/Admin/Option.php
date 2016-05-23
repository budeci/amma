<?php

Admin::model('App\Option')->title('Option')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('name')->label('Name'),
		Column::string('value')->label('Value'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('name', 'Name')->required(),
		FormItem::text('slug', 'Slug')->required(),
		FormItem::text('value', 'Value')->required(),
		FormItem::image('image', 'Image'),
	]);
	return $form;
});