<?php

namespace Modules\Cms\Traits;

trait CmsTrait
{
    public function getLastOrdering($model)
    {
        $modelClass = get_class($model);

        $newModel = new $modelClass;
        // todo: find better option
        $modelColumns = \Schema::getColumnListing((new $newModel)->getTable());
        if (!in_array('ordering', $modelColumns)) {
            return null;
        }
        return ($newModel->max('ordering')) ? $newModel->max('ordering') : 0;
    }

    public function getNextOrdering($model)
    {
        $getOrdering = $this->getLastOrdering($model);

        if ($getOrdering === null) {
            return null;
        }

        return $getOrdering + 1;
    }
}
