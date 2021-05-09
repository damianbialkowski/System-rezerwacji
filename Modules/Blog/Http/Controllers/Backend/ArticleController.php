<?php

namespace Modules\Blog\Http\Controllers\Backend;

use Modules\Admin\Http\Controllers\Controller as CoreController;
use Modules\Blog\Entities\Article;
use Modules\Blog\Forms\ArticleForm;
use Modules\Blog\Http\Requests\ArticleRequest;

class ArticleController extends CoreController
{
    public function __construct()
    {
        $this->model = Article::class;
        $this->form = ArticleForm::class;
        $this->baseView = 'panel.articles';
        $this->baseRoute = 'articles';
        $this->request = ArticleRequest::class;
        parent::__construct();
    }
}
