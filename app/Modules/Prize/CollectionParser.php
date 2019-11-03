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
        $_this = $this;
        return $collection->reduce(function ($arr, $item) use($_this){
            //
            $item->position = $_this->getPosition($item->key);
            $key = preg_replace('/_[0-9]/', '', $item->key);
            $key = str_replace('_', '-', $key);
            
            $arr[$key][] = $item;
            return $arr;
        }, []);
    }

    public function padPrizes($collection)
    {
        # code...
        dd($collection);
        foreach($collection as $col) {
            
        }
    }

    public function getPosition($string)
    {
        # code...
        $postion = filter_var($string, FILTER_SANITIZE_NUMBER_INT);
        $postion = $this->addOrdinalNumberSuffix($postion);
        return $postion;
    }

    function addOrdinalNumberSuffix($num) {
        if (!$num) {
            return;
        }

        if (!in_array(($num % 100),array(11,12,13))){
          switch ($num % 10) {
            // Handle 1st, 2nd, 3rd
            case 1:  return $num.'st';
            case 2:  return $num.'nd';
            case 3:  return $num.'rd';
          }
        }
        return $num.'th';
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