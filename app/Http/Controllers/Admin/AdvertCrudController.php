<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\AdvertAdminRequest as UpdateRequest;


class AdvertCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Advert');
        $this->crud->setRoute('admin/obyav');
        $this->crud->setEntityNameStrings('объявление', 'объявления');

        $this->crud->denyAccess(['create', 'delete']);
        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        // ------ CRUD COLUMNS
        $this->crud->addColumn([
        'name' => 'title', // The db column name
            'label' => "Название", // Table column heading
        ]); // add a text column, at the end of the stack
        $this->crud->addColumn('slug'); // add a single column, at the end of the stack
        $this->crud->addColumn([
            'name' => 'published', // The db column name
            'label' => "Опубликовано", // Table column heading
            'type' => 'check'
        ]);
        $this->crud->addColumn([
            'name' => 'accepted', // The db column name
            'label' => "Одобрено", // Table column heading
            'type' => 'check'
        ]);
        $this->crud->addColumn([
            'name' => 'main_page', // The db column name
            'label' => "На главную", // Table column heading
            'type' => 'check'
        ]);
        // $this->crud->addColumns(); // add multiple columns, at the end of the stack
        // $this->crud->removeColumn('column_name'); // remove a column from the stack
        // $this->crud->removeColumns(['column_name_1', 'column_name_2']); // remove an array of columns from the stack
        // $this->crud->setColumnDetails('column_name', ['attribute' => 'value']); // adjusts the properties of the passed in column (by name)
        // $this->crud->setColumnsDetails(['column_1', 'column_2'], ['attribute' => 'value']);

        // -------------------------
        // ------ CRUD FIELDS ------
        // -------------------------
        // ----------
        // SIMPLE tab
        // ----------

        $this->crud->addField([   // Checkbox
            'name'  => 'accepted',
            'label' => 'Одобрить',
            'type'  => 'checkbox',
        ]);

        $this->crud->addField([   // Checkbox
            'name'  => 'published',
            'label' => 'Опубликовать',
            'type'  => 'checkbox',
        ]);
        $this->crud->addField([   // Checkbox
            'name'  => 'main_page',
            'label' => 'Показать на главной странице',
            'type'  => 'checkbox',
        ]);
        $this->crud->addField([
            'label' => 'Категория',
            'type' => 'select',
            'name' => 'category_id',
            'entity' => 'category',
            'attribute' => 'name',
            'model' => "App\Models\Category",
            'readonly'=>'readonly',
        ]);

        $this->crud->addField([
            'name'  => 'title',
            'label' => 'Заголовок',
            'type' => 'text',
            'readonly'=>'readonly',
        ]);
        $this->crud->addField([
            'name' => 'slug',
            'label' => 'Slug (URL)',
            'type' => 'text',
            'hint' => trans('categories.category_slug_hint'),
            'readonly'=>'readonly',
            // 'disabled' => 'disabled'
        ]);
        $this->crud->addField([   // Number
            'name'  => 'price',
            'label' => 'Цена',
            'type'  => 'number',
            'attributes' => ['step' => 'any'], // allow decimals
            'suffix' => "Руб.",
            'readonly'=>'readonly',
        ]);


        $this->crud->addField([   // Textarea
            'name'  => 'description_short',
            'label' => 'Короткое описание',
            'hint' => 'Описание для вывода на странице поиска объявления',
            'type'  => 'textarea',
            'readonly'=>'readonly',
        ]);

        $this->crud->addField([   // Textarea
            'name'  => 'description',
            'label' => 'Описание',
            'hint' => 'Описание для полной страницы объявления',
            'type'  => 'simplemde',
            'readonly'=>'readonly',
        ]);

        $this->crud->addField([
            'name'  => 'meta_title',
            'label' => 'Мета заголовок',
            'readonly'=>'readonly',
        ]);
        $this->crud->addField([
            'name'  => 'meta_description',
            'label' => 'Мета описание',
            'type'  => 'textarea',
            'readonly'=>'readonly',
        ]);

        $this->crud->addField([   // Hidden
            'name'    => 'modified_by',
            'type'    => 'hidden',
            'default' => \Auth::id(),
        ]);
        $this->crud->enableAjaxTable();

        $this->crud->orderBy('main_page', 'desc');
        $this->crud->orderBy('accepted');
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

}
