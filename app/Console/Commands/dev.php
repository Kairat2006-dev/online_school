<?php

namespace App\Console\Commands;

use App\Http\Controllers\WordFileController;
use App\Models\Cource;
use App\Models\Profile;
use App\Models\SoderCource;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class dev extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dev';

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
//        ->getStateUsing(
//        function ($file) {
//            if($file->avatar && $file){
//                return Storage::disk('public')->url('avatars/' . $file->avatar);
//            }
//        }
//    )

        $profile = Profile::find(7);
        $s = Storage::disk('public')->url('avatars/' . $profile->avatar);
        dd($s);

    }
}
