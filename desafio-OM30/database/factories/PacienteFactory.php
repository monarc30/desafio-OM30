<?php

namespace Database\Factories;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

class PacienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Paciente::class;

    public function withFaker()
    {
        return \Faker\Factory::create('pt_BR');
    }
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name(),
            'mae' => $this->faker->name(),            
            'data_nascimento' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            //'cpf' => $this->faker->cpf(false), // '45623467866'
            //'cns' => $this->faker->cpf(false), // '45623467866'
            'cpf' => $this->faker->numerify('###########'),
            'cns' => $this->faker->numerify('###############'),
            'file_path' => $this->faker->imageUrl($width = 200, $height = 200),
            'cep' => $this->faker->postcode,
            'endereco' => $this->faker->address,
            'numero' => $this->faker->numberBetween($min = 1, $max = 6000),
            'complemento' => $this->faker->secondaryAddress,
            'bairro' => $this->faker->streetAddress,
            'cidade' => $this->faker->city,
            'estado' => $this->faker->stateAbbr
        ];
    }
}
