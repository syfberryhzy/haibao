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
                'title' => '美文分类',
                'icon' => '',
                'parent_id' => 0,
                'order' => 1,
                'status' => 1,
                'created_at' => '2018-01-06 14:56:52',
                'updated_at' => '2018-01-06 14:57:14',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => '图片分类',
                'icon' => '',
                'parent_id' => 0,
                'order' => 4,
                'status' => 1,
                'created_at' => '2018-01-06 15:00:50',
                'updated_at' => '2018-01-06 15:19:06',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => '歌词歌单',
                'icon' => 'images/singer.png',
                'parent_id' => 1,
                'order' => 2,
                'status' => 1,
                'created_at' => '2018-01-06 15:17:52',
                'updated_at' => '2018-01-10 14:51:11',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => '影视动漫',
                'icon' => 'images/comic.png',
                'parent_id' => 1,
                'order' => 3,
                'status' => 1,
                'created_at' => '2018-01-06 15:18:10',
                'updated_at' => '2018-01-10 14:51:31',
            ),
            4 => 
            array (
                'id' => 5,
                'title' => '其他美文',
                'icon' => 'images/other.png',
                'parent_id' => 1,
                'order' => 0,
                'status' => 1,
                'created_at' => '2018-01-10 14:52:46',
                'updated_at' => '2018-01-10 14:52:46',
            ),
            5 => 
            array (
                'id' => 6,
                'title' => '文学著作',
                'icon' => 'images/literature.png',
                'parent_id' => 1,
                'order' => 0,
                'status' => 1,
                'created_at' => '2018-01-10 14:53:09',
                'updated_at' => '2018-01-10 14:53:09',
            ),
            6 => 
            array (
                'id' => 7,
                'title' => '名人名言',
                'icon' => 'images/motto.png',
                'parent_id' => 1,
                'order' => 0,
                'status' => 1,
                'created_at' => '2018-01-10 14:53:28',
                'updated_at' => '2018-01-10 14:53:28',
            ),
            7 => 
            array (
                'id' => 8,
                'title' => '电影台词',
                'icon' => 'images/movie.png',
                'parent_id' => 1,
                'order' => 0,
                'status' => 1,
                'created_at' => '2018-01-10 14:54:07',
                'updated_at' => '2018-01-10 14:54:07',
            ),
            8 => 
            array (
                'id' => 9,
                'title' => '风景',
                'icon' => 'images/scenery.png',
                'parent_id' => 2,
                'order' => 0,
                'status' => 1,
                'created_at' => '2018-01-10 14:54:23',
                'updated_at' => '2018-01-10 14:54:23',
            ),
            9 => 
            array (
                'id' => 10,
                'title' => '动物',
                'icon' => 'images/animal.png',
                'parent_id' => 2,
                'order' => 0,
                'status' => 1,
                'created_at' => '2018-01-10 14:55:01',
                'updated_at' => '2018-01-10 14:55:01',
            ),
            10 => 
            array (
                'id' => 11,
                'title' => '星空',
                'icon' => 'images/sky.png',
                'parent_id' => 2,
                'order' => 0,
                'status' => 1,
                'created_at' => '2018-01-10 14:55:21',
                'updated_at' => '2018-01-10 14:55:21',
            ),
            11 => 
            array (
                'id' => 12,
                'title' => '浪漫',
                'icon' => 'images/romantic.png',
                'parent_id' => 2,
                'order' => 0,
                'status' => 1,
                'created_at' => '2018-01-10 15:09:15',
                'updated_at' => '2018-01-10 15:09:15',
            ),
            12 => 
            array (
                'id' => 13,
                'title' => '艺术',
                'icon' => 'images/art.png',
                'parent_id' => 2,
                'order' => 0,
                'status' => 1,
                'created_at' => '2018-01-10 15:11:10',
                'updated_at' => '2018-01-10 15:11:10',
            ),
            13 => 
            array (
                'id' => 14,
                'title' => '植物',
                'icon' => 'images/botany.png',
                'parent_id' => 2,
                'order' => 0,
                'status' => 1,
                'created_at' => '2018-01-10 15:13:35',
                'updated_at' => '2018-01-10 15:13:35',
            ),
            14 => 
            array (
                'id' => 15,
                'title' => '经典',
                'icon' => 'images/fe5558eb36421532cfa34cc3fd4f2913.png',
                'parent_id' => 3,
                'order' => 0,
                'status' => 1,
                'created_at' => '2018-01-31 11:35:15',
                'updated_at' => '2018-01-31 11:35:15',
            ),
            15 => 
            array (
                'id' => 16,
                'title' => '网络',
                'icon' => 'images/8210f7ee26fdfc06f70a1066ef647251.png',
                'parent_id' => 3,
                'order' => 0,
                'status' => 1,
                'created_at' => '2018-01-31 11:35:47',
                'updated_at' => '2018-01-31 11:35:47',
            ),
            16 => 
            array (
                'id' => 17,
                'title' => '古风',
                'icon' => 'images/6788a8bd813b07abc36aa124e919bc15.png',
                'parent_id' => 3,
                'order' => 0,
                'status' => 1,
                'created_at' => '2018-01-31 11:36:32',
                'updated_at' => '2018-01-31 11:36:32',
            ),
            17 => 
            array (
                'id' => 18,
                'title' => '周杰伦',
                'icon' => 'images/ba14aa1216fc354d83ae5bcc22ca57aa.png',
                'parent_id' => 3,
                'order' => 0,
                'status' => 1,
                'created_at' => '2018-01-31 11:38:17',
                'updated_at' => '2018-01-31 11:38:17',
            ),
            18 => 
            array (
                'id' => 19,
                'title' => '王力宏',
                'icon' => 'images/350dc4064ed638203ea699dc92c0f538.png',
                'parent_id' => 3,
                'order' => 0,
                'status' => 1,
                'created_at' => '2018-01-31 11:38:46',
                'updated_at' => '2018-01-31 11:38:46',
            ),
            19 => 
            array (
                'id' => 20,
                'title' => '《芳华》',
                'icon' => 'images/f4e3b48cbd415472792ae6b34252f008.png',
                'parent_id' => 3,
                'order' => 0,
                'status' => 1,
                'created_at' => '2018-01-31 11:39:52',
                'updated_at' => '2018-01-31 11:39:52',
            ),
            20 => 
            array (
                'id' => 21,
                'title' => '《无问西东》',
                'icon' => 'images/6307f1ca7334e68891d7fabcb806749b.png',
                'parent_id' => 3,
                'order' => 0,
                'status' => 1,
                'created_at' => '2018-01-31 11:40:34',
                'updated_at' => '2018-01-31 11:40:34',
            ),
        ));
        
        
    }
}