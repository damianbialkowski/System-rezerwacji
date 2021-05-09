<?php

namespace Modules\Admin\Forms;

use Modules\Core\src\FormBuilder\Form;
use Modules\Admin\Entities\Role;

class RoleForm extends Form
{

    public function buildForm()
    {
        $this
            ->add('name')
            ->add('title')
            ->add('active', 'checkbox')
            ->add('update', 'submit',
                [
                    'label' => module_lang('form.update'),
                    'attr' => [
                        'class' => 'btn',
                    ]
                ]);
    }
}
