<?php

Admin::model(App\BlogTranslation::class)->title('Blog Description')->display(function ()
{
    $display = AdminDisplay::datatables();
    return $display;
})->createAndEdit(function ($id)
{
	$form = AdminForm::form();
    $blog = App\BlogTranslation::where('id', $id)->first();
    if (!empty($blog)) {
        $blog_id = $blog->blog_id;
        $language_id = $blog->locale;
    }else{
        $blog_id = Request::segment(3);
        $language_id = 0;
    }
	$form->items([
		FormItem::text('name', 'Article Name')->required(),
        FormItem::text('slug', 'Slug'),
        FormItem::ckeditor('description', 'Description'),
        FormItem::ckeditor('text', 'Text'),
        FormItem::text('meta_title', 'Meta Tag Title'),
        FormItem::textarea('meta_description', 'Meta Tag Description'),
        FormItem::textarea('meta_keyword', 'Meta Tag Keywords'),
        FormItem::hidden('blog_id')->defaultValue($blog_id),
        FormItem::hidden('locale')->defaultValue($language_id),
	]);
	return $form;
});