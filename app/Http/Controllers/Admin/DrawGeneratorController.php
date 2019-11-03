<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Base\LogService;
use App\Modules\LuckyDraw\Exceptions\NoMemberAvailableException;
use App\Modules\LuckyDraw\Exceptions\WinningNumberNotFound;
use App\Modules\LuckyDraw\LuckyDrawService;
use App\Modules\LuckyDraw\Validation;
use App\Modules\Prize\Exceptions\NoAvailablePrizesException;
use App\Modules\Prize\PrizeService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class DrawGeneratorController extends Controller
{
    //
    protected $log_service;

    protected $lucky_draw_service;

    protected $prize_service;

    protected $validation;
    
    public function __construct(
        LogService $log_service,
        LuckyDrawService $lucky_draw_service,
        Validation $validation,
        PrizeService $prize_service
    ) {
        # code...
        $this->validation = $validation;
        $this->log_service = $log_service;
        $this->lucky_draw_service = $lucky_draw_service;
        $this->prize_service = $prize_service;
    }

    public function generatePrizes()
    {
        # code...
        try {
            $this->lucky_draw_service->generatePrizes();
            
            return redirect()
                ->back()
                ->with('success', __('Prizes Generated'));
        } catch (\Exception $e) {
            return $this->handleExceptions($e);
        }

    }

    public function generatePrize(Request $request)
    {
        # code...
        $this->validation
            ->validateDrawInput($request)
            ->validate();

        $this->setInputFlash(
            $request, 
            $request->input('winning_number'),
            $request->input('randomized'),
            $request->input('prize_id')
        );
        
        try {
            $prize_id = $request->input('prize_id');
            $winning_number = $request->input('winning_number');
            
            $prize = $this->prize_service->getActivePrize($prize_id);
            $draw_winner = $this->lucky_draw_service->generatePrize($prize, $winning_number);
            
            $request->session()->flash('winning_number', $draw_winner->winning_number->number);
            
            return redirect()
                ->back()
                ->with('success', __('Prize generated'));
        } catch (\Exception $e) {
            return $this->handleExceptions($e);
        }
    }

    public function setInputFlash(Request $request, $number, $rand, $prize_id)
    {
        # code...
        $request->session()
            ->flash('winning_number', $number);
        $request->session()
            ->flash('randomized', $rand);
        $request->session()
            ->flash('prize_id', $prize_id);
    }

    public function handleExceptions(\Exception $e)
    {
        # code...
        switch (true){
            case $e instanceof NoAvailablePrizesException:
                $msg = __('All pizes have been won!');
            break;
            case $e instanceof NoMemberAvailableException;
                $msg = __('Cannot complete') . " - {$e->getMessage()}";
            break;
            case $e instanceof WinningNumberNotFound:
                $msg = __('Winning number not eligible to win the prize');
            break;
            /**
             * Model Exceptions not found should be unique per model
             * but for demo purposes I will be using the default laravel
             * ModelNotFoundException
             */
            case $e instanceof ModelNotFoundException:
                $msg = __('Prize not found');
            break;
            case $e instanceof \Exception;
                $time = $this->log_service->log($e, 'error');
                $msg = "{$time}: {$e->getMessage()}";
            break;
        }
        
        return redirect()
                ->back()
                ->with('process-error', $msg);
        
    }


}
