<?php

namespace Database\Factories;

use App\Models\Opsi;
use App\Models\Soal;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class OpsiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Opsi::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $arrIdSoal = Soal::all()->modelKeys();
        $arrNoSoal = DB::table('soals')->select('no')->get();
        $arrTipe = ['A', 'B', 'C', 'D', 'E'];
        static $count = 0;
        return [
            'soal_id'=> $arrIdSoal[$count/5],
            'body'=> '<p>ini Opsi '.$arrTipe[$count%5].' Soal id '.$arrIdSoal[$count/5].' no '.$arrNoSoal[$count/5]->no.'</p>',
            'tipe'=>$arrTipe[$count++%5],
        ];
    }
}
