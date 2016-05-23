<?php

Admin::model(Commerce\Productso\Models\PrsoSeller::class)->title('Seller')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('name')->label('Name'),
		Column::image('image')->label('Logo'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('name', 'Name')->required(),
        FormItem::text('slug', 'Slug'),
        FormItem::text('email', 'Email'),
        FormItem::text('phone', 'Phone'),
        FormItem::ckeditor('description', 'Description'),
        FormItem::timestamp('published_at', 'Published Date'),
        FormItem::image('image', 'Logo'),
        //FormItem::multiimages('photos', 'Images'),
        FormItem::checkbox('show', 'Show')->defaultValue(true),
	]);
	return $form;
});