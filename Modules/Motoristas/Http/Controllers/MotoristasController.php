<?php

namespace Modules\Motoristas\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Kris\LaravelFormBuilder\FormBuilder;
use Modules\Motoristas\Entities\Motoristas;
use Modules\Motoristas\Form\MotoristasForm;

class MotoristasController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $motoristas = Motoristas::all();;

        return view('motoristas::index', compact(['motoristas']));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(FormBuilder $formBuilder)
    {
        $motorista = new Motoristas();

        $form = $formBuilder->create(MotoristasForm::class, [
            'method' => 'POST',
            'url' => url('motoristas/store'),
            'model' => $motorista
        ]);

        return view('motoristas::create', compact('form'));
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

            $motorista = $this->save(new Motoristas, $request);

            Session::flash('type', 'success');
            Session::flash('message', 'Item adicionado com sucesso');

            return redirect()->route('Admin.Motoristas');
        } catch (\Throwable $th) {
            DB::rollBack();

            Session::flash('type', 'error');
            Session::flash('message', $th->getMessage());

            return redirect()->route('Admin.Motoristas');
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(FormBuilder $formBuilder, Motoristas $motorista)
    {
        $form = $formBuilder->create(MotoristasForm::class, [
            'method' => 'PUT',
            'url' => url('motoristas/update/' . $motorista->id),
            'model' => $motorista
        ]);
        return view('motoristas::edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Motoristas $motorista)
    {
        DB::beginTransaction();

        try {
            DB::commit();

            $motorista = $this->save($motorista, $request);

            Session::flash('type', 'success');
            Session::flash('message', 'Item editado com sucesso');

            return redirect()->route('Admin.Motoristas');
        } catch (\Throwable $th) {
            DB::rollBack();

            Session::flash('type', 'error');
            Session::flash('message', $th->getMessage());

            return redirect()->route('Admin.Motoristas');
        }
    }

    public function save(Motoristas $motorista, Request $request)
    {

        foreach ($motorista->getFillable() as $fillable) {
            $motorista->$fillable = $request->input($fillable);
        }
        $motorista->status = $request->input('status') ? 1 : 0;

        $motorista->save();

        return $motorista;
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Motoristas $motorista)
    {
        $motorista->delete();

        Session::flash('type', 'success');
        Session::flash('message', 'Item deletado com sucesso');
    }
}
