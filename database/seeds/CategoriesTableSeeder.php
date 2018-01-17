<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => '图片分类',
                'parent_id' => 0,
                'order' => 1,
                'status' => 1,
                'created_at' => '2018-01-06 14:56:52',
                'updated_at' => '2018-01-06 14:57:14',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => '美文分类',
                'parent_id' => 0,
                'order' => 4,
                'status' => 1,
                'created_at' => '2018-01-06 15:00:50',
                'updated_at' => '2018-01-06 15:19:06',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => '用户上传',
                'parent_id' => 1,
                'order' => 2,
                'status' => 1,
                'created_at' => '2018-01-06 15:17:52',
                'updated_at' => '2018-01-10 14:51:11',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => '文艺',
                'parent_id' => 1,
                'order' => 3,
                'status' => 1,
                'created_at' => '2018-01-06 15:18:10',
                'updated_at' => '2018-01-10 14:51:31',
            ),
            4 => 
            array (
                'id' => 5,
                'title' => '动物',
                'parent_id' => 1,
                'order' => 0,
                'status' => 1,
                'created_at' => '2018-01-10 14:52:46',
                'updated_at' => '2018-01-10 14:52:46',
            ),
            5 => 
            array (
                'id' => 6,
                'title' => '星空',
                'parent_id' => 1,
                'order' => 0,
                'status' => 1,
                'created_at' => '2018-01-10 14:53:09',
                'updated_at' => '2018-01-10 14:53:09',
            ),
            6 => 
            array (
                'id' => 7,
                'title' => '水墨',
                'parent_id' => 1,
                'order' => 0,
                'status' => 1,
                'created_at' => '2018-01-10 14:53:28',
                'updated_at' => '2018-01-10 14:53:28',
            ),
            7 => 
            array (
                'id' => 8,
                'title' => '风景',
                'parent_id' => 1,
                'order' => 0,
                'status' => 1,
                'created_at' => '2018-01-10 14:54:07',
                'updated_at' => '2018-01-10 14:54:07',
            ),
            8 => 
            array (
                'id' => 9,
                'title' => '卡通',
                'parent_id' => 1,
                'order' => 0,
                'status' => 1,
                'created_at' => '2018-01-10 14:54:23',
                'updated_at' => '2018-01-10 14:54:23',
            ),
            9 => 
            array (
                'id' => 10,
                'title' => '插画',
                'parent_id' => 1,
                'order' => 0,
                'status' => 1,
                'created_at' => '2018-01-10 14:55:01',
                'updated_at' => '2018-01-10 14:55:01',
            ),
            10 => 
            array (
                'id' => 11,
                'title' => '明星',
                'parent_id' => 1,
                'order' => 0,
                'status' => 1,
                'created_at' => '2018-01-10 14:55:21',
                'updated_at' => '2018-01-10 14:55:21',
            ),
            11 => 
            array (
                'id' => 12,
                'title' => '歌词',
                'parent_id' => 2,
                'order' => 0,
                'status' => 1,
                'created_at' => '2018-01-10 15:09:15',
                'updated_at' => '2018-01-10 15:09:15',
            ),
            12 => 
            array (
                'id' => 13,
                'title' => '电影台词',
                'parent_id' => 2,
                'order' => 0,
                'status' => 1,
                'created_at' => '2018-01-10 15:11:10',
                'updated_at' => '2018-01-10 15:11:10',
            ),
            13 => 
            array (
                'id' => 14,
                'title' => '名人名言',
                'parent_id' => 2,
                'order' => 0,
                'status' => 1,
                'created_at' => '2018-01-10 15:13:35',
                'updated_at' => '2018-01-10 15:13:35',
            ),
            14 => 
            array (
                'id' => 15,
                'title' => '搞笑段子',
                'parent_id' => 2,
                'order' => 0,
                'status' => 1,
                'created_at' => '2018-01-10 15:14:04',
                'updated_at' => '2018-01-10 15:14:04',
            ),
            15 => 
            array (
                'id' => 16,
                'title' => '小清新',
                'parent_id' => 2,
                'order' => 0,
                'status' => 1,
                'created_at' => '2018-01-10 15:14:42',
                'updated_at' => '2018-01-10 15:14:42',
            ),
            16 => 
            array (
                'id' => 17,
                'title' => '名著美文',
                'parent_id' => 2,
                'order' => 0,
                'status' => 1,
                'created_at' => '2018-01-10 15:15:08',
                'updated_at' => '2018-01-10 15:15:08',
            ),
            17 => 
            array (
                'id' => 18,
                'title' => '小说精选',
                'parent_id' => 2,
                'order' => 0,
                'status' => 1,
                'created_at' => '2018-01-10 15:15:34',
                'updated_at' => '2018-01-10 15:15:34',
            ),
            18 => 
            array (
                'id' => 19,
                'title' => '二次元',
                'parent_id' => 2,
                'order' => 0,
                'status' => 1,
                'created_at' => '2018-01-10 15:15:54',
                'updated_at' => '2018-01-10 15:15:54',
            ),
        ));
        
        
    }
}