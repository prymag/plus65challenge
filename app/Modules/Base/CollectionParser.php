<?php

namespace App\Modules\Base;

use Illuminate\Support\Collection;

class CollectionParser {
    
    public function filter(
        Collection $collection,
        $field,
        $value
    ) {
        return $collection
            ->filter(function($collection) use ($field, $value) {
                return $collection->$field == $value;
            });
    }

}