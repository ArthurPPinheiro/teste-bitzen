<?php namespace Modules\Motoristas\Form;

use Kris\LaravelFormBuilder\Form;

class MotoristasForm extends Form
{
    public function buildForm()
    {
        $selected_cnh_type = $this->model->cnh_type;
        $selected_status = $this->model->status;

        $this
            ->add('name', 'text', ['label' => 'Nome', 'rules' => 'required'])
            ->add('cpf', 'text', ['label' => 'CPF', 'rules' => 'required'])
            ->add('cnh', 'number', ['label' => 'Número CNH', 'rules' => 'required'])
            ->add('cnh_type', 'select', ['choices' => ['A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E'], 'label' => 'Categoria CNH', 'selected' => $selected_cnh_type, 'rules' => 'required'])
            ->add('birthday', 'date', ['label' => 'Data de Nascimento', 'rules' => 'required'])
            ->add('status', 'select', ['choices' => ['1' => 'Ativo', '0' => 'Inativo'], 'label' => 'Status', 'selected' => $selected_status, 'rules' => 'required'])
            ->add('submit', 'submit', ['label' => 'Salvar', 'attr' => ['class' => 'btn btn-primary'], 'rules' => 'required']);
    }

}
