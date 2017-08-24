<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Requests\CrudRequest as StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\URL;

class ComentarioController extends CrudController
{
    //
    public function setup() {
        $this->crud->setModel("App\Entities\Comentario");
        $this->crud->setRoute("admin/comentario");
        $this->crud->setEntityNameStrings('comentario', 'comentarios');

        $this->crud->setColumns(['texto', 'livro_id', 'user_id']);
//        $this->crud->addFields([
//            [
//                'name'  => 'texto',
//                'label' => 'Comentario',
//                'type'  => 'textarea',
//            ],
//            [
//                'name'  => 'livro_id',
//                'label' => 'Livro',
//                'type'  => 'text',
//            ],
//            [
//                'name'  => 'user_id',
//                'label' => 'Usuario',
//                'type'  => 'text',
//            ],
//        ]);
    }

    public function store(StoreCommentRequest $request)
    {
        $this->crud->setRoute(URL::previous());
        return parent::storeCrud();
    }

    /**
     * Store a newly created resource in the database.
     *
     * @param StoreRequest $request - type injection used for validation using Requests
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeCrud(StoreRequest $request = null)
    {
        $this->crud->hasAccessOrFail('create');

        // fallback to global request instance
        if (is_null($request)) {
            $request = \Request::instance();
        }

        // replace empty values with NULL, so that it will work with MySQL strict mode on
        foreach ($request->input() as $key => $value) {
            if (empty($value) && $value !== '0') {
                $request->request->set($key, null);
            }
        }
        // insert item in the db

        $item = $this->crud->create($request->except(['save_action', '_token', '_method']));

        $this->data['entry'] = $this->crud->entry = $item;

        // show a success message
        \Alert::success(trans('backpack::crud.insert_success'))->flash();

        // save the redirect choice for next time
        $this->setSaveAction();

        return $this->performSaveAction($item->getKey());
    }

    public function update(Request $request)
    {
        return parent::updateCrud();
    }
}
