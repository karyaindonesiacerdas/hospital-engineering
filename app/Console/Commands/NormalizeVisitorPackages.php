<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class NormalizeVisitorPackages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'visitor:normalize-package';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Normalize visitor package by sorting it ascendingly';

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
        $offset = 0;
        $limit = 100;
        $end = false;
        while(!$end) {
            echo "offset = {$offset}\n";
            $users = User::limit($limit)->offset($offset)->get();
            foreach ($users as $user) {
                $user->package_id = $this->normalize($user->package_id);
                $user->save();
            }
            $offset += $limit;
            $n = count($users);
            $end = $n < $limit;
        }
        return 0;
    }

    private function normalize($package) {
        if ($package === null) return [];
        if (is_array($package)) {
            sort($package);
            foreach($package as &$p) {
                $p = strval($p);
            }
            if (count($package) && $package[0] === '0') {
                unset($package[0]);
                return array_values($package);
            }
            return $package;
        }
        if (is_int($package)) return [strval($package)];
        if (is_string($package)) {
            return $this->normalize(json_decode($package));
        }
    }
}
