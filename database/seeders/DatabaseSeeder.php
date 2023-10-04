<?php

namespace Database\Seeders;

use Apiato\Core\Loaders\SeederLoaderTrait;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    use SeederLoaderTrait;

    private function setEnv($name, $value)
    {
        $path = base_path('.env');
        if (file_exists($path)) {
            //            Log::debug('editing env');
            file_put_contents($path, str_replace(
                $name . '=' . env($name),
                $name . '=' . $value,
                file_get_contents($path)
            ));
        }

    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker): void
    {
        //        Artisan::call('queue:table');
        //        Artisan::call('migrate');
        if(is_local()) {
            Artisan::call('migrate:fresh');
            //        if (DB::table('oauth_clients')->count() < 2) {
            Artisan::call('passport:install');
            Artisan::call('passport:client --password --name="apiato Password Grant Client" --provider=users');
        }
        $passportGrantClient = DB::table('oauth_clients')->where('id', '=', 2)->pluck('secret');
        $this->setEnv("CLIENT_WEB_ID", 2);
        $this->setEnv("CLIENT_WEB_SECRET", $passportGrantClient[0]);

        $passportGrantClient = DB::table('oauth_clients')->where('id', '=', 3)->pluck('secret');
        $this->setEnv("CLIENT_MOBILE_ID", 3);
        $this->setEnv("CLIENT_MOBILE_SECRET", $passportGrantClient[0]);


        $faker->seed(config('app.seeder-seed'));
        $this->runLoadingSeeders();
    }
}
