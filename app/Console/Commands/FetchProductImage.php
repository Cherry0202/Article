<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\ProductImage;
use Log;

class FetchProductImage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
//    protected $signature = 'command:name';
    protected $signature = 'command:fetch_product_image';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        Log::info('コマンド実行開始');

        // 非同期実行を明確化するために1分遅延させる
        ProductImage::dispatch('https://cdn.qiita.com/assets/qiita-rectangle-71910ff07b744f263e4a2657e2ffd123.png', 'Qiita.png')
            ->delay(now()->addMinutes(1));

        Log::info('コマンド実行完了');
    }
}
