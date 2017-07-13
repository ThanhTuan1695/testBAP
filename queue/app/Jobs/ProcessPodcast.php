<?php

namespace App\Jobs;
use App\Podcast;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProcessPodcast implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $postcast;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(PodCast $podcast)
    {
        $this->postcast = $postcast;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(AudioProcessor $process)
    {
        
    }
}
