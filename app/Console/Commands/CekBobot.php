<?php

namespace App\Console\Commands;

use App\Models\Soal;
use Illuminate\Console\Command;

class CekBobot extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'koreksi:bobot';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Buat Bobot';

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
        $soals = Soal::with('answers')->get();
        $bar = $this->output->createProgressBar(count($soals));
        $bar->start();
        foreach($soals as $soal){
            $jmlBenar = 0;
            $jmlSoal = count($soal->answers);
            foreach ($soal->answers as $answer) {
                if($answer->value == $soal->answer){
                    $jmlBenar++;
                }
            }
            $bar->advance();
            $soal->bobot = $this->ChangeToBobot($jmlBenar/$jmlSoal);
            $soal->save();
        }
        $bar->finish();
        return 0;
    }
    public function ChangeToBobot($nilai)
    {
        if($nilai > 0.75){
            return 1;
        }
        else if($nilai > 0.5){
            return 2;
        }
        else if($nilai > 0.25){
            return 3;
        }
        else{
            return 4;
        }
    }
}
