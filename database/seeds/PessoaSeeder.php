<?php
/**
 * Created by PhpStorm.
 * User: mpiacentinis
 * Date: 28/01/16
 * Time: 16:12
 */
use CodeAgenda\Entities\Pessoa;
use Illuminate\Database\Seeder;
use JansenFelipe\FakerBR\FakerBR;

class PessoaSeeder extends Seeder
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

        for($i=1; $i<=300; $i++){

            Pessoa::insert([
                'name' => $faker->name,
                'apelido' => $faker->firstName,
                'cpf' => $faker->cpf,
                'sexo' => $faker->randomElement(['M','F']),
                'created_at' => $faker->dateTime,
                'updated_at' => $faker->dateTime
            ]);

        }
    }
}