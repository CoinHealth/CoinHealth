<?php

namespace App\Jobs\Logs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Record;

class MakeLog 
{
    protected $logs; 
    
    public function __construct(array $logs)
    {
        $this->logs = $logs;
    }

    
    public function handle()
    {
        $data = $this->logs;
        $data['user_id'] = auth()->user()->id;
        $save = Record::create($data);
        return $save;
    }
}
