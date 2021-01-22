<?php

namespace App\Console\Commands;

use App\Models\Progress;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class MasukanDataPeserta extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:peserta';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Masukin data peserta';

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

        $filename = asset('database/DataPeserta.csv');
        $delimiter = ",";

        $header = array();
        $datas = array();

        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header)
                    $header = $row;
                else
                    $datas[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        $bar = $this->output->createProgressBar(count($datas));
        $bar->start();
        foreach ($datas as $data) {
           $peserta = new User;
           $peserta->name = $data['Nama'];
           $peserta->kelas = $data['Kelas'];
           $peserta->username = $data['NIS'];
           $peserta->password = Hash::make($data['NISN']);
           $peserta->save();
            $noKelas = explode(" ", $data['Kelas'])[2];
            $Jurusan = explode(" ", $data['Kelas'])[1];
            $progress = new Progress;
            if($noKelas < 7 && $Jurusan == 'MIPA'){
                $progress->sesi_id = 1;
            }else{
                $progress->sesi_id = 2;
            }
            $progress->user_id = $peserta->id;
            $progress->save();
           $bar->advance();
        }
        $bar->finish();
        $this->info(' Sukses menambahkan user sebanyak '. count($datas) .' orang');
        return 0;
    }
}
