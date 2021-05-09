<?php

namespace Modules\Blog\Forms;

use Modules\Core\src\FormBuilder\Form;

class CategoryForm extends Form
{
    public function buildForm()
    {
        $this->add('name', 'text', [
            'rules' => 'required'
        ]);
        $this->add('slug');
        $this->add('description', 'textarea');
        $this->add('active', 'checkbox');
    }
}
