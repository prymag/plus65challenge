<?php

namespace App\Modules\Prize;

use App\Modules\Base\LogService;
use App\Modules\Prize\Exceptions\NoAvailablePrizesException;
use App\Modules\Prize\Prize;
use App\Modules\Prize\PrizeSeed;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PrizeService {

    protected $prize;

    protected $prize_seed;

    protected $log_service;

    protected $queries;

    public function __construct(
        Prize $prize,
        PrizeSeed $prize_seed,
        Queries $queries,
        LogService $log_service
    ) {
        # code...
        $this->prize_seed = $prize_seed;
        $this->prize = $prize;
        $this->queries = $queries;
        $this->log_service = $log_service;
    }

    public function seed()
    {
        # code...
        $seeds = $this->prize_seed->get();

        foreach ($seeds as $seed) {
            try {
                $this->create($seed);
            } catch (\Exception $e) {
                $this->log_service->log($e, 'error');
            }
        }
    }

    public function create($args)
    {
        # code...
        $model = $this->prize->make();
        $model->title = $args['title'];
        $model->key = $args['key'];
        $model->sort_order = $args['sort_order'];
        $model->save();

        return $model;
    }

    public function getAll()
    {
        # code...
        return $this->prize
            ->orderBy('sort_order', 'asc')
            ->get();
    }

    public function getActivePrizes()
    {
        # code...
        $query = $this->queries->activePrizes();
        $prizes = $query->get();

        if (!$prizes->count()) {
            throw new NoAvailablePrizesException(__('No Available Prizes'));
        }

        return $prizes;
    }

    public function getActivePrize($prize_id)
    {
        # code...
        $query = $this->queries->activePrizes();
        $prize = $query->where('prizes.id', $prize_id)->first();

        if (!$prize) {
            throw new ModelNotFoundException("Not Found");
        }

        return $prize;
    }

}