<?php

Admin::model('App\Blog')->title('Articles')->display(function ()
{
    $display = AdminDisplay::datatables();
    $display->columns([
        Column::string('name')->label('Name'),
        Column::image('image')->label('Image'),
    ]);
    return $display;
})->createAndEdit(function ($id)
{
    $display = AdminDisplay::tabbed();
    $display->tabs(function () use ($id)
    {
        $tabs = [];

        $form = AdminForm::form();
        $form->items([
			FormItem::text('name', 'Name')->required(),
            FormItem::text('slug', 'Slug'),
            FormItem::image('image', 'Image'),
            FormItem::multiimages('photos', 'Images'),
			FormItem::timestamp('published_at', 'Published Date'),
			FormItem::checkbox('show', 'Show')->defaultValue(true),
        ]);
        $tabs[] = AdminDisplay::tab($form)->label('General')->active(true);


        if ( ! is_null($id))
        {
            $languages = App\Language::where('show', 1)->orderBy('sort_order', 'asc')->get();
            $fields = array();
            foreach ($languages as $item) {
                $blog = App\BlogTranslation::where('blog_id', $id)->where('locale', $item->code)->first();
                if (!empty($blog)) {
                    $editId = $blog->id;
                } else {
                     $editId = 0;
                }
                $description = Admin::model(App\BlogTranslation::class)->fullEdit($editId);
                $fieldes     = array(FormItem::hidden('lang_code')->defaultValue($item->code));
                $result      = array_merge ($description->items(), $fieldes);
                $description->items($result);
                $tabs[] = AdminDisplay::tab($description)->label($item->name);


            }
        }
        return $tabs;
    });
    return $display;
});