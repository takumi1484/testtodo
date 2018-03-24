<?php

use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->truncate();

        DB::table('rooms')->insert([
            [
                'room_id'   => 'room1',
                'created_at' => '2000-01-1 00:00:00',
                'updated_at' => '2000-01-1 00:00:00',
            ],
            [
                'room_id'   => 'room2',
                'created_at' => '2000-01-1 00:00:00',
                'updated_at' => '2000-01-1 00:00:00',
            ],
            [
                'room_id'   => 'てすとるーむ',
                'created_at' => '2000-01-1 00:00:00',
                'updated_at' => '2000-01-1 00:00:00',
            ],
        ]);
    }
}
