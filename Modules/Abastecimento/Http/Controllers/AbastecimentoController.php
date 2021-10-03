<?php

namespace Modules\Abastecimento\Http\Controllers;

use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Kris\LaravelFormBuilder\FormBuilder;
use Modules\Abastecimento\Entities\Abastecimento;
use Modules\Abastecimento\Form\AbastecimentoForm;

class AbastecimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $abastecimentos = Abastecimento::all();;

        return view('abastecimento::index', compact(['abastecimentos']));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(FormBuilder $formBuilder)
    {
        $abastecimento = new Abastecimento();

        $form = $formBuilder->create(AbastecimentoForm::class, [
            'method' => 'POST',
            'url' => url('abastecimento/store'),
            'model' => $abastecimento
        ]);

        return view('abastecimento::create', compact('form'));
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

            $abastecimento = $this->save(new Abastecimento, $request);

            Session::flash('type', 'success');
            Session::flash('message', 'Item adicionado com sucesso');

            return redirect()->route('Admin.Abastecimento');
        } catch (\Throwable $th) {
            DB::rollBack();

            Session::flash('type', 'error');
            Session::flash('message', $th->getMessage());

            return redirect()->route('Admin.Abastecimento');
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(FormBuilder $formBuilder, Abastecimento $abastecimento)
    {
        $form = $formBuilder->create(AbastecimentoForm::class, [
            'method' => 'PUT',
            'url' => url('abastecimento/update/' . $abastecimento->id),
            'model' => $abastecimento
        ]);
        return view('abastecimento::edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Abastecimento $abastecimento)
    {
        DB::beginTransaction();

        try {
            DB::commit();

            $abastecimento = $this->save($abastecimento, $request);

            Session::flash('type', 'success');
            Session::flash('message', 'Item editado com sucesso');

            return redirect()->route('Admin.Abastecimento');
        } catch (\Throwable $th) {
            DB::rollBack();

            Session::flash('type', 'error');
            Session::flash('message', $th->getMessage());

            return redirect()->route('Admin.Abastecimento');
        }
    }

    public function save(Abastecimento $abastecimento, Request $request)
    {

        foreach ($abastecimento->getFillable() as $fillable) {
            $abastecimento->$fillable = $request->input($fillable);
        }

        if($abastecimento->veiculo->capacidade_tanque < $request->input('quantidade_combustivel')){
            throw new Exception('Quantidade abastecida é maior que a capacidade do tanque.');
        }

        if($abastecimento->veiculo->tipo_combustivel != $request->input('tipo_combustivel')){
            throw new Exception('O tipo de combustivel não é compativel com seu veículo.');
        }

        switch ($request->input('tipo_combustivel')) {
            case 'gasolina':
                $abastecimento->valor = $abastecimento->quantidade_combustivel * 4.29;
                break;
            case 'etanol':
                $abastecimento->valor = $abastecimento->quantidade_combustivel * 2.99;
                break;
            default:
                $abastecimento->valor = $abastecimento->quantidade_combustivel * 2.09;
                break;
        }

        $abastecimento->save();

        return $abastecimento;
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Abastecimento $abastecimento)
    {
        $abastecimento->delete();

        Session::flash('type', 'success');
        Session::flash('message', 'Item deletado com sucesso');
    }
}
