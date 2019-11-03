<?php

namespace App\Modules\Prize;

use Illuminate\Support\Collection;

class CollectionParser {

    /**
     * Group Relevant Prizes in array
     *
     * @param Collection $collection
     * @return Array
     */
    public function groupPrizes(Collection $collection)
    {
        # code...
        return $collection->reduce(function ($arr, $item) {
            //
            $key = preg_replace('/_[0-9]/', '', $item->key);
            $key = str_replace('_', '-', $key);

            $arr[$key][] = $item;
            return $arr;
        }, []);
    }

    public function toSelectOpts(Collection $collection)
    {
        # code...
        return $collection->reduce(function($arr, $item) {
            $arr[$item->id] = $item->title;
            return $arr;
        }, ['' => __('Please Select')]);
    }

}