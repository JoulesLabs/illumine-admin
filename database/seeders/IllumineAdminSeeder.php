<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use JoulesLabs\IllumineAdmin\Models\IllumineAdmin;

class IllumineAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IllumineAdmin::truncate();

        $emails = [
            'shamir.imtiaz@jouleslabs.com',
            'ashraful@jouleslabs.com',
            'zahid@jouleslabs.com'
        ];


        foreach ($emails as $email) {
            IllumineAdmin::factory()
                ->create([
                    'email' => $email
                ]);
        }
    }
}
