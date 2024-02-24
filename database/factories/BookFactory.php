<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition()
    {
        return [
            'title' => "xxxxxx",
            'purchase_price' => $this->faker->randomNumber(4),
            'selling_price' => $this->faker->randomNumber(4),
            'purchase_date' => now(),
        ];
    }

}
