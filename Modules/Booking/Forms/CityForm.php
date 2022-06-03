<?php

namespace Modules\Booking\Forms;

use Modules\Cms\Forms\BaseCmsForm;

class CityForm extends BaseCmsForm
{
    public function buildForm()
    {
        $this->add('name');
        $this->add('slug');

        $this->add('short_content', 'textarea');
        $this->add('content', 'textarea');

        $this->add('active', 'checkbox');

        $this->add('image', 'file');
    }
}
