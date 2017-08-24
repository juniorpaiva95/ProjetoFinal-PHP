<?php

namespace App\Http\Controllers;

use App\Entities\Livro;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Requests\CrudRequest as StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class LivroLidoController extends CrudController
{
    public function setup() {
        $this->crud->setModel("App\Entities\LivroLido");
        $this->crud->setRoute("admin/livro-lido");
        $this->crud->setEntityNameStrings('livro-lido', 'livro-lidos');

        $this->crud->setListView('backpack::livro.show-acervo');
//        $this->crud->enableAjaxTable();
        $this->crud->enableExportButtons();
        $this->crud->with(['livro','user']);
        $this->crud->setColumns(['livro_id', 'user_id']);
//        $this->crud->addFields([
//            [
//                'name'  => 'titulo',
//                'label' => 'Titulo do Livro',
//                'type'  => 'text',
//            ],
//            [
//                'name'  => 'editora',
//                'label' => 'Editora',
//                'type'  => 'text',
//            ],
//        ]);


    }

    public function store(Request $request)
    {
        $this->crud->setRoute(URL::previous());
        return $this->storeCrud();
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
        // Recuperar o livro
        $livro = Livro::find($request->livro_id);
        \Alert::success("Livro {$livro->titulo} adicionado ao acervo com sucesso!")->flash();

        // save the redirect choice for next time
        $this->setSaveAction();

        return $this->performSaveAction($item->getKey());
    }

    public function update(Request $request)
    {
        return parent::updateCrud();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return string
     */
    public function destroy($id)
    {
        $this->crud->hasAccessOrFail('delete');

        $this->crud->delete($id);
        return redirect()->back();
    }

}
