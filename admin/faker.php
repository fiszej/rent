<?php

include 'bootstrap.php';


require_once 'vendor/autoload.php';

$faker = Faker\Factory::create();

$faker->addProvider(new \Faker\Provider\Fakecar($faker));

// for ($i= 0; $i <= 100; $i++) {
//     $customer->firstname = $faker->firstName();
//     $customer->lastname = $faker->lastName;
//     $customer->email = $faker->email;
//     $customer->password = $faker->password;
//     $customer->save();
// }

// for ($i = 0; $i < 25; $i++) {
//     $car->brand = $faker->vehicleBrand;
//     $car->model = $faker->vehicleModel;
//     $car->production = rand(2010, 2021);
//     $car->price = rand(150, 400);
//     $car->categoryId = rand(13,20);
//     $car->status = rand(0,1);
//     $car->save();
// }

// for ($i = 0;$i <= 500; $i++) {
//     $rentals->start = $faker->date('Y-m-d', '2021-12-30');
//     $rentals->carID = rand(12,36);
//     $rentals->days = rand(1,20);
//     $rentals->customerID = rand(7, 92);
//     $rentals->save();


// }