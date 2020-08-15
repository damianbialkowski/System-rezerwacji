<?php

namespace Modules\Admin\Forms;

use Modules\Core\src\FormBuilder\Form;
use Modules\Admin\Entities\Role;

class AdminForm extends Form
{

    public function buildForm()
    {
        $this
            ->add('_method', 'hidden', ['value' => 'PUT'])
            ->add('name', 'text')
            ->add('last_name', 'text')
            ->add('login', 'text')
            ->add('email', 'email')
            ->add('role_id', 'select',
                [
                    'choices' => Role::prepareRolesSelect(),
                    'label' => module_trans('admins.form.role')
                ])
            ->add('password', 'repeated', [
                'type' => 'password',
                'second_name' => 'password_confirmation',

            ])
            ->add('update', 'submit',
                [
                    'label' => module_trans('admins.form.update'),
                    'attr' => [
                        'class' => 'btn',
                    ]
                ]);
    }
}
