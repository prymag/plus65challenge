<?php

namespace App\Modules\LuckyDraw;

use Illuminate\Http\Request;
use Illuminate\Validation\Factory as Validator;


class Validation {
    //
    protected $validator;

    public function __construct(Validator $validator)
    {
        # code...
        $this->validator = $validator;
    }

    public function validateDrawInput(Request $request)
    {
        # code...
        $rules = [
            'prize_id' => 'required',
            'winning_number' => 'required_unless:randomized,on'
        ];
        return $this->validator
            ->make(
                $request->all(), 
                $rules,
                $this->validateDrawInputMessages()
            )
            ->after(function() use ($request) {
                $request->session()->flash('show_form', 1);
            });
    }

    public function validateDrawInputMessages()
    {
        # code...
        return [
            'prize_id.required' => 'The Prize is required'
        ];
    }

}