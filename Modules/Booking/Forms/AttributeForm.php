<?php

namespace Modules\Booking\Forms;

use Modules\Core\src\FormBuilder\Form;

class AttributeForm extends Form
{
    public function buildForm()
    {
        $this->add('name', 'text', [
            'rules' => 'required'
        ]);
        $this->add('code');
        $this->add('active', 'checkbox');
        $this->add('filter', 'checkbox');
    }
}
