<?php

Admin::model(Commerce\Productso\Models\PrsoProduct::class)->title('Products')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('name')->label('Name'),
		Column::datetime('published_at')->label('Published')->format('d.m.Y'),
		Column::datetime('expired')->label('Expired')->format('d.m.Y'),
		Column::string('total_stock')->label('Total stock'),
		Column::string('views')->label('Views'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('name', 'Name')->required(),
		FormItem::text('slug', 'Slug'),
		FormItem::image('image', 'Image'),
		FormItem::multiimages('photos', 'Images'),
		FormItem::text('price', 'Price'),
		FormItem::text('old_price', 'Old Price'),
		FormItem::text('total_stock', 'Total stock'),
		FormItem::text('stock', 'Stock'),
		FormItem::select('seller', 'Seller')->model(Commerce\Productso\Models\PrsoSeller::class)->display('name')->required(),

		FormItem::multiselect('categories', 'Categories')->model(Commerce\Productso\Models\PrsoCategory::class)->display('name')->required(),
		//FormItem::multiselect('seller', 'Seller')->model(Commerce\Productso\Models\PrsoSeller::class)->display('name'),
		FormItem::text('gender', 'Gender'),
		FormItem::text('brand', 'Brand'),
		FormItem::text('type_material', 'Type Material'),
		FormItem::text('season', 'Season'),
		FormItem::text('views', 'Views')->readonly(),
		FormItem::radio('condition', 'Condition')->options([1 => 'New', 2 => 'Used']),
		FormItem::timestamp('published_at', 'Published Date'),
		FormItem::timestamp('expired', 'Expired Date'),
		FormItem::ckeditor('note', 'Note'),
		FormItem::ckeditor('description', 'Description'),
		FormItem::checkbox('recommend', 'Recommendation'),
		FormItem::checkbox('show', 'Show')->defaultValue(true),
	]);
	return $form;
});