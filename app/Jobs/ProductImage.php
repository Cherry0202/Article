<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Log;

class ProductImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $url;

    private $fileName;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        // 画像URL
        $this->url = $url;

        // 画像名
        $this->fileName = $fileName;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        // storage直下へファイルを保存
        file_put_contents("./storage/$this->fileName", file_get_contents($this->url));
        Log::info('キュー実行完了');
    }
}
