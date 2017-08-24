<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Illuminate\Http\Request;

class ComentarioController extends CrudController
{
    //
    public function setup() {
        $this->crud->setModel("App\Entities\Comentario");
        $this->crud->setRoute("admin/comentario");
        $this->crud->setEntityNameStrings('comentario', 'comentarios');

        $this->crud->setColumns(['texto', 'livro_id']);
        $this->crud->addFields([
            [
                'name'  => 'texto',
                'label' => 'Comentario',
                'type'  => 'textarea',
            ],
            [
                'name'  => 'livro_id',
                'label' => 'Livro',
                'type'  => 'text',
            ],
        ]);
    }

    public function store(StoreCommentRequest $request)
    {
        dd($request->all());
        return parent::storeCrud();
    }

    public function update(Request $request)
    {
        return parent::updateCrud();
    }
}
