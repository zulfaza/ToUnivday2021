<?php

namespace App\Console\Commands;

use App\Models\Nilai;
use App\Models\User;
use Illuminate\Console\Command;

class KoreksiNilai extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'koreksi:nilai';

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
     * @return int
     */
    public function handle()
    {
        $users = User::where('status', 3)->with('answers.soal', 'progress')->get();
        $bar = $this->output->createProgressBar(count($users));
        $bar->start();
        foreach ($users as $user){
            $nilai = 0;
            foreach($user->answers as $answer){
                if($answer->value == $answer->soal->answer){
                    $this->line($answer->value.' '.$answer->soal->answer);
                    $nilai += $answer->soal->bobot;
                }
            }
            $bar->advance();
            $this->line('');
            $nilaiObj = new Nilai;
            $nilaiObj->progress_id = $user->progress->id;
            $nilaiObj->user_id = $user->id;
            $nilaiObj->value = $nilai*3;
            $nilaiObj->save();
        }
        $bar->finish();
        return 0;
    }
}
