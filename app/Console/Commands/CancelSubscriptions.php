<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Subscription;
use Illuminate\Support\Carbon;

class CancelSubscriptions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subs:cancel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'anuluje subskrypcje dla których nieodnotowano płatności w terminie 7 dni od daty ich końca,';

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
     * @return int
     */
    public function handle()
    {
        Subscription::where('updated_at','>', Carbon::now()->subDays(37))->update(['status', 'inactive']);
        $this->info('Anulowano subskrybcje, w których nie otrzymano płatności 7 dni od daty zakończenia.');
    }
}
