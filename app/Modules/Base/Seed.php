<?php

namespace App\Modules\Base;

class Seed implements SeedInterface {

    protected $data;

    public function get()
    {
        # code...
        return $this->data;
    }
}