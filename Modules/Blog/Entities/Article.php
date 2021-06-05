<?php

namespace Modules\Blog\Entities;

use Modules\Cms\Entities\CmsModel;
use Modules\Cms\Traits\CmsTrait;

class Article extends CmsModel
{
    use CmsTrait;

    protected $fillable = [
        'domain_id',
        'name',
        'slug',
        'author_id',
        'introduction',
        'content',
        'active',
        'published',
        'published_at',
        'created_by',
        'updated_by'
    ];

    protected $dates = [
        'published_at',
        'created_at',
        'deleted_at',
    ];

    protected $casts = [
        'name' => 'json',
        'slug' => 'json',
        'introduction' => 'json',
        'content' => 'json'
    ];

    public array $translatable = [
        'name',
        'slug',
        'introduction',
        'content'
    ];

    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

    public function getLinkAction()
    {
        return 'link-action';
    }

    public function generateCustomLink()
    {
        return 'articles/article-test';
    }

}
