<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AutoDisableSubscriber extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:auto-disable-subscriber';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Subscriber will automatic disabled';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::all();
        foreach ($users as $user) {
            if ($user->subscription_type == '1_month' && $user->billings == 200 && $user->created_at->addMonth() <= now()) {

                $user->update([
                    'billings' => '0.00',
                    'type' => 4
                ]);
            } elseif ($user->subscription_type == '1_year' && $user->billings == 500 && $user->created_at->addYear() <= now()) {

                $user->update([
                    'billings' => '0.00',
                    'type' => 4
                ]);
            } else {
            }
        }

        $this->info('The subscriber will automatically disabled');
    }
}
