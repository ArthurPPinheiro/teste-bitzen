<?php namespace Modules\Abastecimento\Form;

use Kris\LaravelFormBuilder\Form;
use Modules\Motoristas\Entities\Motoristas;
use Modules\Veiculo\Entities\Veiculo;

class AbastecimentoForm extends Form
{
    public function buildForm()
    {
        $veiculos = Veiculo::get();
        $veiculos_select = array();

        $motoristas = Motoristas::get();
        $motoristas_select = array();

        foreach($veiculos as $veiculo){
            $veiculos_select[$veiculo->id] = $veiculo->fabricante . ' - ' . $veiculo->nome_veiculo;
        }

        foreach($motoristas as $motorista){
            $motoristas_select[$motorista->id] =  $motorista->name;
        }

        $this
            ->add('veiculo_id', 'select', ['label' => 'Veículo', 'choices' => $veiculos_select])
            ->add('motorista_id', 'select', ['label' => 'Motorista', 'choices' => $motoristas_select])
            ->add('data', 'date', ['label' => 'Data'])
            ->add('tipo_combustivel', 'select', ['choices' => ['etanol' => 'Etanol', 'diesel' => 'Diesel', 'gasolina' => 'Gasolina'], 'label' => 'Tipo Combustível'])
            ->add('quantidade_combustivel', 'number', ['label' => 'Quantidade Abastecido'])
            ->add('submit', 'submit', ['label' => 'Salvar', 'attr' => ['class' => 'btn btn-primary']]);
    }
}
