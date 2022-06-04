<?php

namespace Modules\Booking\Forms;

use Modules\Core\src\FormBuilder\Form;

class ReservationForm extends Form
{
    public function buildForm()
    {
        $this->add('date_from', 'text', [
            'rules' => 'required',
            'attr' => ['disabled']
        ]);
        $this->add('date_to', 'text', [
            'rules' => 'required',
            'attr' => ['disabled']
        ]);
        $this->add('total_price', 'text', [
            'rules' => 'required',
            'attr' => ['disabled']
        ]);
        $this->add('cancelled_at', 'date');
    }
}
