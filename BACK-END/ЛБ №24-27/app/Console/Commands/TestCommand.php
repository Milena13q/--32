<?php

namespace App\Console\Commands;

use App\Mail\OrderMail;
use App\Models\Order;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Mail::to('samuel.nestro@mail.ru')
            ->send(new OrderMail(Order::query()->find(11)));
    }
}
