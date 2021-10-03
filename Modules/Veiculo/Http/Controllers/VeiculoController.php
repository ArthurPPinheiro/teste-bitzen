<?php

namespace Modules\Veiculo\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Kris\LaravelFormBuilder\FormBuilder;
use Modules\Veiculo\Entities\Veiculo;
use Modules\Veiculo\Form\VeiculoForm;

class VeiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $veiculos = Veiculo::all();;

        return view('veiculo::index', compact(['veiculos']));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(FormBuilder $formBuilder)
    {
        $veiculo = new Veiculo();

        $form = $formBuilder->create(VeiculoForm::class, [
            'method' => 'POST',
            'url' => route('Admin.Veiculo.store'),
            'model' => $veiculo
        ]);

        return view('veiculo::create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            DB::commit();

            $veiculo = $this->save(new Veiculo, $request);

            Session::flash('type', 'success');
            Session::flash('message', 'Item adicionado com sucesso');

            return redirect()->route('Admin.Veiculo');
        } catch (\Throwable $th) {
            DB::rollBack();

            Session::flash('type', 'error');
            Session::flash('message', $th->getMessage());

            return redirect()->route('Admin.Veiculo');
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(FormBuilder $formBuilder, Veiculo $veiculo)
    {
        $form = $formBuilder->create(VeiculoForm::class, [
            'method' => 'PUT',
            'url' => url('veiculo/update/' . $veiculo->id),
            'model' => $veiculo
        ]);
        return view('veiculo::edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Veiculo $veiculo)
    {
        DB::beginTransaction();

        try {
            DB::commit();

            $veiculo = $this->save($veiculo, $request);

            Session::flash('type', 'success');
            Session::flash('message', 'Item editado com sucesso');

            return redirect()->route('Admin.Veiculo');
        } catch (\Throwable $th) {
            DB::rollBack();

            Session::flash('type', 'error');
            Session::flash('message', $th->getMessage());

            return redirect()->route('Admin.Veiculo');
        }
    }

    public function save(Veiculo $veiculo, Request $request)
    {

        foreach ($veiculo->getFillable() as $fillable) {
            $veiculo->$fillable = $request->input($fillable);
        }

        $veiculo->save();

        return $veiculo;
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Veiculo $veiculo)
    {
        $veiculo->delete();

        Session::flash('type', 'success');
        Session::flash('message', 'Item deletado com sucesso');
    }
}
