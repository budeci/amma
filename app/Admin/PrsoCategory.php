<?php

Admin::model(Commerce\Productso\Models\PrsoCategory::class)->title('Categories')->display(function ()
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
        $form->items([
            FormItem::text('name', 'Name')->required(),
            FormItem::text('slug', 'Slug'),
            FormItem::image('image', 'Image'),
            FormItem::multiimages('photos', 'Images'),
            FormItem::checkbox('show', 'Show')->defaultValue(true),
            FormItem::checkbox('showhome', 'Show in Home Page Category'),
            FormItem::checkbox('showfooter', 'Show in menu Footer Category'),

        ]);

        $tabs[] = AdminDisplay::tab($form)->label('General')->active(true);


        if ( ! is_null($id))
        {
            $languages = App\Language::where('show', 1)->orderBy('sort_order', 'asc')->get();
            $fields = array();
            foreach ($languages as $item) {
                $category    = Commerce\Productso\Models\CategoryTranslation::where('prso_category_id', $id)->where('locale', $item->code)->first();
                $editId      = !empty($category) ? $category->id : 0;
                $description = Admin::model(Commerce\Productso\Models\CategoryTranslation::class)->fullEdit($editId);
                //$description->parameters(['prso_category_id' => $id, 'language_id' => $item->language_id]);
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