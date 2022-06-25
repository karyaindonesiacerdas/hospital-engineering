<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class NormalizeVisitorSurvey extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'visitor:normalize-survey {ids}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Normalize visitor survey by looking up csv result from google form';

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
        $ids = explode(',', $this->argument('ids'));
        foreach ($ids as $id) {
            $this->handleById($id);
        }
        return 0;
    }

    private function handleById($id) {
        echo "=== Running batch ${id} ===\n";
        $file = fopen(storage_path("app/survey/${id}.csv"), 'r');
        fgetcsv($file);
        $i = 1;
        while(($row = fgetcsv($file))) {
            $mobile = preg_replace("/[^0-9]/", "", $row[2]);
            if ($mobile) {
                $mobile = substr($mobile, 2);
                $user = User::where('mobile', 'LIKE', "%{$mobile}")->first();
                if ($user) {
                    $surveyed = $user->surveyed_package_id ?? [];
                    if (!in_array($id, $surveyed)) {
                        $surveyed[] = $id;
                        sort($surveyed);
                        $user->surveyed_package_id = $surveyed;
                        $user->save();
                    }
                } else {
                    echo "> {$id} - {$i} - {$row[2]} - Not Found\n";
                }
            }
            if ($i % 50 === 0) echo "> {$id} - {$i}\n";
            $i++;
        }
        echo "=== Closing batch ${id} ===\n";
    }
}
