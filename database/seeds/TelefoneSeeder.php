<?php
/**
 * Created by PhpStorm.
 * User: mpiacentinis
 * Date: 28/01/16
 * Time: 16:12
 */
use CodeAgenda\Entities\Telefone;
use Illuminate\Database\Seeder;
use JansenFelipe\FakerBR\FakerBR;

class TelefoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $faker->addProvider(new FakerBR($faker));

        for($i=1; $i<=600; $i++){

            Telefone::insert([

                'descricao' => $faker->randomElement(['Comercial','Residencial','Celular','Recados']),
                'codipais' => $faker->optional(0.7,55)->numberBetween(1,197),
                'ddd' => $faker->numberBetween(11,91),
                'prefixo' => $faker->randomNumber(4),
                'sufixo' => $faker->randomNumber(4),
                'pessoa_id' => $faker->numberBetween(1,300)
            ]);

        }
    }
}