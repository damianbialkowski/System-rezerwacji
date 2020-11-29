<?php

namespace Modules\Admin\Forms;

use Modules\Core\src\FormBuilder\Form;
use Modules\Admin\Entities\Role;

class RoleForm extends Form
{

    public function buildForm()
    {
        $this
            ->add('_method', 'hidden', ['value' => 'PUT'])
            ->add('name', 'text')
            ->add('title', 'text')
            ->add('update', 'submit',
                [
                    'label' => module_trans('admins.form.update'),
                    'attr' => [
                        'class' => 'btn',
                    ]
                ]);
    }
}
