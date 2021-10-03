<?php namespace Modules\Veiculo\Form;

use Kris\LaravelFormBuilder\Form;

class VeiculoForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('placa', 'text', ['label' => 'Placa', 'rules' => 'required'])
            ->add('nome_veiculo', 'text', ['label' => 'Nome do Veículo', 'rules' => 'required'])
            ->add('tipo_combustivel', 'select', ['choices' => ['etanol' => 'Etanol', 'diesel' => 'Diesel', 'gasolina' => 'Gasolina'], 'label' => 'Tipo de Combustível', 'rules' => 'required'])
            ->add('fabricante', 'text', ['label' => 'Fabricante', 'rules' => 'required'])
            ->add('ano_fabricacao', 'number', ['label' => 'Ano de Fabricação', 'rules' => 'required'])
            ->add('capacidade_tanque', 'number', ['label' => 'Capacidade do Tanque', 'rules' => 'required'])
            ->add('observacoes', 'textarea', ['label' => 'Observações'])
            ->add('submit', 'submit', ['label' => 'Salvar', 'attr' => ['class' => 'btn btn-primary']]);
    }
}
