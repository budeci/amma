<?php

Admin::model(Commerce\Productso\Models\CategoryTranslation::class)->title('Category Description')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->columns([
        Column::string('name')->label('Name'),
    ]);
	return $display;

})->createAndEdit(function ($id)
{
	$form = AdminForm::form();
    $cat = Commerce\Productso\Models\CategoryTranslation::where('id', $id)->first();
    if (!empty($cat)) {
        $prso_category_id = $cat->prso_category_id;
        $language_id = $cat->locale;
    }else{
        $prso_category_id = Request::segment(3);
        $language_id = 0;
    }
    $form->items([
        FormItem::text('name', 'Category Name'),
        FormItem::text('slug', 'Slug'),
        FormItem::ckeditor('description', 'Category description'),
        FormItem::text('meta_title', 'Meta Tag Title'),
        FormItem::textarea('meta_description', 'Meta Tag Description'),
        FormItem::textarea('meta_keyword', 'Meta Tag Keywords'),
        FormItem::hidden('prso_category_id')->defaultValue($prso_category_id),
        FormItem::hidden('locale')->defaultValue($language_id),
    ]);
	return $form;
});