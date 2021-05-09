<?php

namespace Modules\Admin\Traits;

trait OnlineModel
{
    public function getFilterListAttribute(): array
    {
        $all = self::withTrashed()->count();
        $active = $this->where('active', 1)->count();
        $inactive = $this->withTrashed()->where('active', 0)->count();
        $trashed = $this->onlyTrashed()->count();

        return [
            'all' => [
                'count' => $all,
                'badge' => 'secondary',
                'param' => '*',
                'base' => true
            ],
            'active' => [
                'count' => $active,
                'badge' => 'success',
                'param' => 1,
            ],
            'inactive' => [
                'count' => $inactive,
                'badge' => 'danger',
                'param' => 0,
            ],
            'trashed' => [
                'count' => $trashed,
                'badge' => 'dark',
                'param' => 2,
            ]
        ];
    }
}
