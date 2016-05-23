<?php

Admin::model('App\PageTranslation')->title('PageTranslation')->display(function ()
{
    $display = AdminDisplay::datatables();
    return $display;
})->createAndEdit(function ($id)
{
	$form = AdminForm::form();
    $page = App\PageTranslation::where('id', $id)->first();
    if (!empty($page)) {
        $page_id = $page->page_id;
        $locale  = $page->locale;
    }else{
        $page_id = Request::segment(3);
        $locale  = 0;
    }
	$form->items([
        FormItem::text('name', 'Page Name'),
        FormItem::text('slug', 'Slug'),
        FormItem::ckeditor('description', 'Page description'),
        FormItem::ckeditor('text', 'Page Content'),
        FormItem::text('meta_title', 'Meta Tag Title'),
        FormItem::textarea('meta_description', 'Meta Tag Description'),
        FormItem::textarea('meta_keyword', 'Meta Tag Keywords'),
        FormItem::hidden('page_id')->defaultValue($page_id),
        FormItem::hidden('locale')->defaultValue($locale),
	]);
	return $form;
});