<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->truncate();

        DB::table('posts')->insert([
            [
                'user_name'       => 'testuserA',
                'room_id'   => 'room1',
                'ip' => '000000000',
                'body' => 'testbody!nnnnnnn',
                'created_at' => '2000-01-1 00:00:00',
                'updated_at' => '2000-01-1 00:00:00',
            ],
            [
                'user_name'       => 'testuserA',
                'room_id'   => 'room2',
                'ip' => '000000000',
                'body' => 'testbody!aaaaaaaaaaa',
                'created_at' => '2000-01-1 00:00:00',
                'updated_at' => '2000-01-1 00:00:00',
            ],
            [
                'user_name'       => 'testuserB',
                'room_id'   => 'room1',
                'ip' => '000000000',
                'body' => 'testbody!bbbbbbbbbbbbb',
                'created_at' => '2000-01-1 00:00:00',
                'updated_at' => '2000-01-1 00:00:00',
            ],
        ]);
    }
}
