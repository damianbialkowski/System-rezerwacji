<?php

namespace Modules\Blog\Http\Controllers\Backend;

use Modules\Admin\Http\Controllers\Controller as CoreController;
use Modules\Blog\Datatables\ArticlesDataTable;

class ArticleController extends CoreController
{
    protected $model = Article::class;
    protected $dataTable = ArticlesDataTable::class;
    protected $form = Article::class;
    protected $baseView = 'panel.articles';
    protected $baseRoute = 'articles';
    protected $requestList = [
//        'store' => AdminCreateRequest::class,
//        'update' => AdminUpdateRequest::class,
    ];
}
