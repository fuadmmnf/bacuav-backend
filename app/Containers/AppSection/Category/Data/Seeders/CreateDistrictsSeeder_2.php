<?php

namespace App\Containers\AppSection\Category\Data\Seeders;

use App\Containers\AppSection\Category\Models\Category;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class CreateDistrictsSeeder_2 extends ParentSeeder
{
    public function run() //creating category nesting assuming max 1 depth
    {
        if (is_local()) {
            srand(config('app.seeder-seed'));
            $districts = ["Dhaka",
                "Faridpur",
                "Gazipur",
                "Gopalganj",
                "Jamalpur",
                "Kishoreganj",
                "Madaripur",
                "Manikganj",
                "Munshiganj",
                "Mymensingh",
                "Narayanganj",
                "Narsingdi",
                "Netrokona",
                "Rajbari",
                "Shariatpur",
                "Sherpur",
                "Tangail",
                "Bogra",
                "Joypurhat",
                "Naogaon",
                "Natore",
                "Nawabganj",
                "Pabna",
                "Rajshahi",
                "Sirajgonj",
                "Dinajpur",
                "Gaibandha",
                "Kurigram",
                "Lalmonirhat",
                "Nilphamari",
                "Panchagarh",
                "Rangpur",
                "Thakurgaon",
                "Barguna",
                "Barisal",
                "Bhola",
                "Jhalokati",
                "Patuakhali",
                "Pirojpur",
                "Bandarban",
                "Brahmanbaria",
                "Chandpur",
                "Chittagong",
                "Comilla",
                "Cox''s Bazar",
                "Feni",
                "Khagrachari",
                "Lakshmipur",
                "Noakhali",
                "Rangamati",
                "Habiganj",
                "Maulvibazar",
                "Sunamganj",
                "Sylhet",
                "Bagerhat",
                "Chuadanga",
                "Jessore",
                "Jhenaidah",
                "Khulna",
                "Kushtia",
                "Magura",
                "Meherpur",
                "Narail",
                "Satkhira",];
            foreach ($districts as $district){
                Category::create(['type' => 'district', 'name' => $district]);
            }

        }
    }
}
