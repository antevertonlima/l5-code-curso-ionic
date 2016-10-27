<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OAuthClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = date('Y-m-d H:i:s');
        DB::table('oauth_clients')->insert([
                'id' => 'appid01',
                'secret' => 'secret',
                'name' => 'Minha App Mobile',
                'created_at' => $data,
                'updated_at' => $data
            ]
        );
    }
}
