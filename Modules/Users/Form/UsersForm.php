<?php namespace Modules\Users\Form;

use Kris\LaravelFormBuilder\Form;

class UsersForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text', ['label' => 'Nome'])
            ->add('email', 'text', ['label' => 'Email']);

        if($this->model->id){
            $this
                ->add('old_password', 'password',  ['label' => 'Senha Antiga'])
                ->add('new_password', 'password',  ['label' => 'Nova Senha'])
                ->add('password_confirmation', 'password',  ['label' => 'Confirmar Nova Senha']);

        }else{
            $this
                ->add('password', 'password',  ['label' => 'Senha'])
                ->add('password_confirmation', 'password',  ['label' => 'Confirmar Senha']);
        }

        // $this
        //     ->add('submit', 'submit', ['label' => 'Salvar', 'attr' => ['class' => 'btn btn-primary']]);
    }
}
