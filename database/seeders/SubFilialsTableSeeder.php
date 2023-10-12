<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubFilialsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('sub_filials')->delete();

        \DB::table('sub_filials')->insert(array (
            0 =>
            array (
                'name' => 'Наманганский',
                'branch_id' => '3',
                'created_at' => '2023-10-11 05:50:38',
                'updated_at' => '2023-10-11 05:50:38',
            ),
            1 =>
            array (
                'name' => 'Учкурганский',
                'branch_id' => '3',
                'created_at' => '2023-10-11 05:51:23',
                'updated_at' => '2023-10-11 05:51:23',
            ),
            2 =>
            array (
                'name' => 'Папский',
                'branch_id' => '3',
                'created_at' => '2023-10-11 05:51:33',
                'updated_at' => '2023-10-11 05:51:33',
            ),
            3 =>
            array (
                'name' => 'Нарынский',
                'branch_id' => '3',
                'created_at' => '2023-10-11 05:51:45',
                'updated_at' => '2023-10-11 05:51:45',
            ),
            4 =>
            array (
                'name' => 'Уйчинский',
                'branch_id' => '3',
                'created_at' => '2023-10-11 05:51:54',
                'updated_at' => '2023-10-11 05:51:54',
            ),
            5 =>
            array (
                'name' => 'Мингбулакский',
                'branch_id' => '3',
                'created_at' => '2023-10-11 05:52:05',
                'updated_at' => '2023-10-11 05:52:05',
            ),
            6 =>
            array (
                'name' => 'Туракурганский',
                'branch_id' => '3',
                'created_at' => '2023-10-11 05:52:14',
                'updated_at' => '2023-10-11 05:52:14',
            ),
            7 =>
            array (
                'name' => 'Янгикурганский',
                'branch_id' => '3',
                'created_at' => '2023-10-11 05:52:23',
                'updated_at' => '2023-10-11 05:52:23',
            ),
            8 =>
            array (
                'name' => 'Чустский',
                'branch_id' => '3',
                'created_at' => '2023-10-11 05:52:44',
                'updated_at' => '2023-10-11 05:52:44',
            ),
            9 =>
            array (
                'name' => 'Чартакский',
                'branch_id' => '3',
                'created_at' => '2023-10-11 05:52:58',
                'updated_at' => '2023-10-11 05:52:58',
            ),
            10 =>
            array (
                'name' => 'Касансайский',
                'branch_id' => '3',
                'created_at' => '2023-10-11 05:53:11',
                'updated_at' => '2023-10-11 05:53:11',
            ),
        ));


    }
}
