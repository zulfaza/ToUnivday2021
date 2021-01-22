<?php

namespace Database\Factories;

use App\Models\Jenis;
use App\Models\Paket;
use App\Models\Soal;
use Illuminate\Database\Eloquent\Factories\Factory;

class SoalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Soal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $no = 0; 
        $answer = $this->faker->randomElement(array('A','B','C', 'D', 'E'));
        $jenis = Jenis::where('tipe', 'saintek')->get()->toArray();
        return [
            'no'=>($no+1),
            'paket_id'=>2,
            'jenis_id'=>$jenis[$no/5]['id'],
            'body'=> '<p>Soal'.$jenis[$no/5]['nama'].' '.(($no++)+1).' Jawbannya '.$answer.'</p>',
            'answer'=>$answer,
        ];
    }
}
