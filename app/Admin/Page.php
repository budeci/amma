<?php

Admin::model('App\Page')->title('Pages')->display(function ()
{

	$display = AdminDisplay::tree();
	$display->value('name');
	$display->with();
	return $display;
})->createAndEdit(function ($id)
{
    $display = AdminDisplay::tabbed();
    $display->tabs(function () use ($id)
    {
        $tabs = [];

        $form = AdminForm::form();
        $fields = [
            FormItem::text('name', 'Name')->required(),
            FormItem::text('slug', 'Slug'),
            FormItem::image('image', 'Image'),
            FormItem::multiimages('photos', 'Images'),
            FormItem::checkbox('show', 'Show')->defaultValue(true),
            FormItem::checkbox('show_badge', 'Show Badge'),
            FormItem::checkbox('show_menu_head', 'Show in Head Menu'),
            FormItem::checkbox('show_menu_footer', 'Show in Footer Menu'),
            FormItem::checkbox('show_collaboration', 'Show in Collaboration'),
        ];

        if (is_null($id)) {
            array_splice($fields, 2, 0, array(FormItem::select('template', 'Template Pages')->options(['page' => 'Pages'])->required()));
        }
        $form->items($fields);
        $tabs[] = AdminDisplay::tab($form)->label('General')->active(true);

        if (!is_null($id))
        {
            $languages = App\Language::where('show', 1)->orderBy('sort_order', 'asc')->get();
            $fields = array();
            foreach ($languages as $item) {
                $page = App\PageTranslation::where('page_id', $id)->where('locale', $item->code)->first();
                if (!empty($page)) {
                    $editId = $page->id;
                } else {
                     $editId = 0;
                }
                $description = Admin::model(App\PageTranslation::class)->fullEdit($editId);

                $fieldes     = array(FormItem::hidden('lang_code')->defaultValue($item->code));
                $result      = array_merge ($description->items(), $fieldes);
                $description->items($result);
                $tabs[] = AdminDisplay::tab($description)->label($item->name);


            }
        }
        return $tabs;
    });
    return $display;
})->delete(function ($id) { if ( in_array($id, [1,2,3,4,5,6,9])) return null; else return 1; });