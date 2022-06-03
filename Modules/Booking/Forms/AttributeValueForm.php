<?php

namespace Modules\Booking\Forms;

use Modules\Core\src\FormBuilder\Form;

class AttributeValueForm extends Form
{
    public function buildForm()
    {
        $this->add('name', 'text', [
            'rules' => 'required'
        ]);
        $this->add('value', 'text', [
            'rules' => 'required'
        ]);
        $this->add('active', 'checkbox');
    }
}
