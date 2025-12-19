<?php
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


route::group([
    'middleware' => 'auth',
    'prefix' => 'produtos'
], function(): void {
    Route::get("/", "ProdutosController@listagem");
    Route::get("/novo", "ProdutosController@formulario");
    Route::get("/{id}/editar","ProdutosController@formulario");
    Route::post("/salvar", "ProdutosController@salvar");
    Route::delete("/{id}/excluir", "ProdutosController@excluir");
});

route::group([
    'middleware' => 'auth',
    'prefix' => 'categorias'
], function(): void {
    Route::get("/", "CategoriasController@listagem");
    Route::get("/novo", "CategoriasController@formulario");
    Route::get("/{id}/editar","CategoriasController@formulario");
    Route::post("/salvar", "CategoriasController@salvar");
    Route::delete("/{id}/excluir", "CategoriasController@excluir");
}
);

route::group([
    'middleware' => 'auth',
    'prefix' => 'marcas'
], function(): void {
    Route::get("/", "MarcasController@listagem");
    Route::get("/novo", "MarcasController@formulario");
    Route::get("/{id}/editar","MarcasController@formulario");
    Route::post("/salvar", "MarcasController@salvar");
    Route::delete("/{id}/excluir", "MarcasController@excluir");
}
);

route::group([
    'middleware' => 'auth',
    'prefix' => 'fornecedores'
], function(): void {
    Route::get("/", "FornecedoresController@listagem");
    Route::get("/novo", "FornecedoresController@formulario");
    Route::get("/{id}/editar","FornecedoresController@formulario");
    Route::post("/salvar", "FornecedoresController@salvar");
    Route::delete("/{id}/excluir", "FornecedoresController@excluir");
}
);

route::group([
    'middleware' => 'auth',
    'prefix' => 'movimentacao'
], function(): void {
    Route::get("/", "MovimentacaoController@listagem");
    Route::get("/novo", "MovimentacaoController@formulario");
    Route::get("/{id}/editar","MovimentacaoController@formulario");
    Route::post("/salvar", "MovimentacaoController@salvar");
    Route::delete("/{id}/excluir", "MovimentacaoController@excluir");
}
);