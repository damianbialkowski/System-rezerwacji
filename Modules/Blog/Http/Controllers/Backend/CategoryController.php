<?php

namespace Modules\Blog\Http\Controllers\Backend;

use Modules\Admin\Http\Controllers\Controller as CoreController;
use Modules\Blog\Entities\Category;
use Modules\Blog\Forms\CategoryForm;
use Modules\Blog\Http\Requests\CategoryRequest;

class CategoryController extends CoreController
{
    public function __construct()
    {
        $this->model = Category::class;
        $this->form = CategoryForm::class;
        $this->baseView = 'panel.categories';
        $this->baseRoute = 'categories';
        $this->request = CategoryRequest::class;
        parent::__construct();
    }
}
