<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Illuminate\Http\Request;

class LivroController extends CrudController
{
    public function setup() {
        $this->crud->setModel("App\Entities\Livro");
        $this->crud->setRoute("admin/livro");
        $this->crud->setEntityNameStrings('livro', 'livros');

        $this->crud->setShowView('backpack::livro.show');

        $this->crud->setColumns(['titulo', 'editora','isbn','paginas','ano','assunto']);
        $this->crud->addFields([
            [
                'name'  => 'titulo',
                'label' => 'Titulo do Livro',
                'type'  => 'text',
            ],
            [
                'name'  => 'editora',
                'label' => 'Editora',
                'type'  => 'text',
            ],
            [
                'name'  => 'isbn',
                'label' => 'ISBN',
                'type'  => 'text',
            ],
            [
                'name'  => 'isbn',
                'label' => 'ISBN',
                'type'  => 'text',
            ],
            [
                'name'  => 'paginas',
                'label' => 'Paginas',
                'type'  => 'text',
            ],
            [
                'name'  => 'ano',
                'label' => 'Ano',
                'type'  => 'text',
            ],
            [
                'name'  => 'assunto',
                'label' => 'Assunto',
                'type'  => 'text',
            ],
        ]);
    }

    public function store(StoreBookRequest $request)
    {
        return parent::storeCrud();
    }

    public function update(Request $request)
    {
        return parent::updateCrud();
    }
}
