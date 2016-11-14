<?php

use CodeDelivery\Models\Client;
use CodeDelivery\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'Superusuario',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'role' => 'admin',
            'remember_token' => str_random(10),
        ])->client()->save(factory(Client::class)->make());

        factory(User::class)->create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('123456'),
            'remember_token' => str_random(10),
        ])->client()->save(factory(Client::class)->make());

        factory(User::class)->create([
            'name' => 'Deliveryman',
            'email' => 'deliveryman@code.com',
            'role' => 'deliveryman',
            'password' => bcrypt('123456'),
            'remember_token' => str_random(10),
        ])->client()->save(factory(Client::class)->make());

        $gravatar = md5('antevertonlima@gmail.com');
        factory(User::class)->create([
            'name' => 'Everton Lima',
            'email' => 'antevertonlima@gmail.com',
            'role' => 'client',
            'gravatar' => "https://www.gravatar.com/avatar/$gravatar",
            'password' => bcrypt('0515852010'),
            'remember_token' => str_random(10),
        ])->client()->save(factory(Client::class)->make());

        factory(User::class, 2)->create()->each(function($u){
            $u->client()->save(factory(Client::class)->make());
        });

        factory(User::class, 3)->create([
            'role' => 'deliveryman',
        ]);
    }
}
