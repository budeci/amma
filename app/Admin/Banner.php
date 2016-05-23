<?php

Admin::model('App\Banner')->title('Banners')->display(function ()
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
		FormItem::text('link', 'Link'),
		FormItem::image('image', 'Image'),
		FormItem::text('views', 'Views')->readonly(),
		FormItem::checkbox('showtop', 'ShowTop in Home Page'),
		FormItem::checkbox('showmiddle', 'ShowMiddle in Home Page'),
		FormItem::checkbox('showbottom', 'Showbottom in Home Page'),
		FormItem::checkbox('show', 'Show')->defaultValue(true),
	]);
	return $form;
});