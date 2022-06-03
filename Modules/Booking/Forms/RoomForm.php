<?php

namespace Modules\Booking\Forms;

use Modules\Cms\Forms\BaseCmsForm;

class RoomForm extends BaseCmsForm
{
    public function buildForm()
    {
        $this->add('name');
        $this->add('slug');

        $this->add('short_content', 'textarea');
        $this->add('content', 'textarea');

        $this->add('active', 'checkbox');

        $this->add('cost', 'number', [
            'rules' => 'min:1'
        ]);
        $this->add('quantity_places', 'number', [
            'rules' => 'min:1'
        ]);

        $this->add('hotel_id', 'hidden', [
            'value' => request()->route('hotel')
        ]);

        $this->add('image', 'file');
    }
}
