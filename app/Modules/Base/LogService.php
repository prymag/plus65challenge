<?php

namespace App\Modules\Base;

use Illuminate\Log\LogManager as Log;

class LogService {

    protected $log;

    public function __construct(Log $log)
    {
        # code...
        $this->log = $log;
    }

    public function log(\Exception $e, $type = 'info')
    {
        # code...
        $time = time();
        switch ($type) {
            case 'error':
                $this->error($e, $time);
                break;
            default:
                $this->info($e, $time);
                break;
        }
    }

    public function error(\Exception $e, $time)
    {
        # code...
        $this->log->error($time . ' - ' . $e->getMessage());
        $this->log->error($e->getTraceAsString());
    }
    
    public function info(\Exception $e, $time)
    {
        # code...
        $this->log->info($time . ' - ' . $e->getMessage());
        $this->log->info($e->getTraceAsString());
    }

}