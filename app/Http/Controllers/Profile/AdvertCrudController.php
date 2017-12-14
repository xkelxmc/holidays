<?php

namespace App\Http\Controllers\Profile;

use Backpack\CRUD\app\Http\Controllers\CrudController;
// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\AdvertRequest as StoreRequest;
use App\Http\Requests\AdvertRequest as UpdateRequest;


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
        $this->crud->setRoute('profile/advert');
        $this->crud->setEntityNameStrings('объявление', 'объявления');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        // ------ CRUD COLUMNS
        $this->crud->addColumn('title'); // add a text column, at the end of the stack
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
        ]);// add a single column, at the end of the stack
        // $this->crud->addColumns(); // add multiple columns, at the end of the stack
        // $this->crud->removeColumn('column_name'); // remove a column from the stack
        // $this->crud->removeColumns(['column_name_1', 'column_name_2']); // remove an array of columns from the stack
        // $this->crud->setColumnDetails('column_name', ['attribute' => 'value']); // adjusts the properties of the passed in column (by name)
        // $this->crud->setColumnsDetails(['column_1', 'column_2'], ['attribute' => 'value']);

        // -------------------------
        // ------ CRUD FIELDS ------
        // -------------------------
        $this->crud->allowAccess('reorder');
        $this->crud->enableReorder('title', 2);
        // ----------
        // SIMPLE tab
        // ----------
        $this->crud->addField([
            'label' => 'Category',
            'type' => 'select',
            'name' => 'category_id',
            'entity' => 'category',
            'attribute' => 'name',
            'model' => "App\Models\Category",
        ]);

        $this->crud->addField([
            'name'  => 'title',
            'label' => 'Заголовок',
        ]);
        $this->crud->addField([
            'name' => 'slug',
            'label' => 'Slug (URL)',
            'type' => 'text',
            'hint' => trans('categories.category_slug_hint'),
            // 'disabled' => 'disabled'
        ]);
        $this->crud->addField([   // Number
            'name'  => 'price',
            'label' => 'price',
            'type'  => 'number',
            'attributes' => ['step' => 'any'], // allow decimals
            'suffix' => "Руб.",
        ]);


        $this->crud->addField([   // Textarea
            'name'  => 'description_short',
            'label' => 'description_short',
            'type'  => 'textarea',
        ]);

        $this->crud->addField([   // Textarea
            'name'  => 'description',
            'label' => 'description',
            'type'  => 'simplemde',
        ]);

        $this->crud->addField([
            'name'  => 'meta_title',
            'label' => 'meta_title',
        ]);
        $this->crud->addField([
            'name'  => 'meta_description',
            'label' => 'meta_description',
            'type'  => 'textarea',
        ]);

        $this->crud->addField([   // Hidden
            'name'    => 'created_by',
            'type'    => 'hidden',
            'default' => \Auth::id(),
        ]);

        $this->crud->addField([ // base64_image
            'label' => "Image",
            'name' => "image",
            'type' => 'image',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 1, // ommit or set to 0 to allow any aspect ratio
            'prefix' => '/storage/'
        ]);


        $this->crud->addField([   // Checkbox
            'name'  => 'published',
            'label' => 'Опубликовать',
            'type'  => 'checkbox',
        ]);
        $this->crud->enableAjaxTable();

        $this->crud->addClause('where', 'created_by', '=',  \Auth::id());

        $this->crud->setShowView('profile.crud.show');
        $this->crud->setEditView('profile.crud.edit');
        $this->crud->setCreateView('profile.crud.create');
        $this->crud->setListView('profile.crud.list');
        $this->crud->setReorderView('profile.crud.reorder');
        $this->crud->setRevisionsView('profile.crud.revision');
        $this->crud->setRevisionsTimelineView('profile.crud.show');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
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