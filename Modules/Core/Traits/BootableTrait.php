<?php

namespace Modules\Core\Traits;

use Illuminate\Auth;
use Carbon\Carbon;

trait BootableTrait
{
    public static function boot()
    {
        parent::boot();

        static::updating(function ($table) {
            $table->updated_by = Auth::id();
            $table->updated_at = Carbon::now();
        });

        static::deleting(function ($table) {
            $table->deleted_by = Auth::id();
            $table->deleted_at = Carbon::now();
            $table->active = 0;
        });

        static::saving(function ($table) {
            $table->created_by = 1;
            $table->updated_by = 1;
            $table->active = 1;
        });
    }
}
