<?php

namespace App\Console\Commands;

use App\Models\Loan;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class UpdateLoanStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'loans:update-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $loans = Loan::where('status', 'Active')
            ->where('due_date', '<', Carbon::now())
            ->get();

        foreach ($loans as $loan) {
            $loan->status = 'Overdue';
            $loan->return_date = Carbon::now();
            $loan->save();
        }

        $this->info('Loan statuses updated successfully.');
    }
}
