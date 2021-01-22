<?php

namespace App\Console\Commands;

use App\Models\Jenis;
use App\Models\Variabel;
use Illuminate\Console\Command;

class starterpack extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:starterpack';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import yang penting penting';

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
        $listJenis = [
            [
                'nama'=>'Penalaran Umum',
                'tipe'=>'tps'
            ],
            [
                'nama'=>'Pemahaman Membaca Dan Menulis',
                'tipe'=>'tps'
            ],
            [
                'nama'=>'Pengetahuan Dan Pemahaman Umum',
                'tipe'=>'tps'
            ],
            [
                'nama'=>'Pengetahuan Kuantitatif',
                'tipe'=>'tps'
            ],
            [
                'nama'=>'Ekonomi',
                'tipe'=>'soshum'
            ],
            [
                'nama'=>'Geografi',
                'tipe'=>'soshum'
            ],
            [
                'nama'=>'Sejarah',
                'tipe'=>'soshum'
            ],
            [
                'nama'=>'Sosiologi',
                'tipe'=>'soshum'
            ],
            [
                'nama'=>'Biologi',
                'tipe'=>'saintek'
            ],
            [
                'nama'=>'Fisika',
                'tipe'=>'saintek'
            ],
            [
                'nama'=>'Kimia',
                'tipe'=>'saintek'
            ],
            [
                'nama'=>'Matematika',
                'tipe'=>'saintek'
            ],
        ];
        foreach ($listJenis as $Datajenis) {
            $jenis = new Jenis;
            $jenis->nama = $Datajenis['nama'];
            $jenis->tipe = $Datajenis['tipe'];
            $jenis->save();
        }
        $this->info('Berhasil menambahkan Jenis');
        $listVariabel = [
            [
                'type' => 'AdminVariabel',
                'name' => 'OpenRegisUser',
                'value' => 'true'
            ],
            [
                'type' => 'AdminVariabel',
                'name' => 'OpenRegisAdmin',
                'value' => 'true'
            ]
        ];
        foreach( $listVariabel as $DataVariabel){
            $variabel = new Variabel;
            $variabel->type = $DataVariabel['type'];
            $variabel->name = $DataVariabel['name'];
            $variabel->value = $DataVariabel['value'];
            $variabel->save();
        }
        $this->info('Berhasil menambahkan variabel');
        return 0;
    }
}
