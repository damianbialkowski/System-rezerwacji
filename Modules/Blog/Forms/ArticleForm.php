<?php

namespace Modules\Blog\Forms;

use Modules\Core\src\FormBuilder\Form;

class ArticleForm extends Form
{
    public function buildForm()
    {
        $this->add('name', 'text', [
            'rules' => 'required'
        ]);
        $this->add('slug');
        $this->add('introduction', 'textarea');
        $this->add('content', 'textarea');
        $this->add('active', 'checkbox');
        $this->add('published', 'checkbox');
    }
}
