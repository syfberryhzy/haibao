<?php

use Illuminate\Database\Seeder;

class AdminMenuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_menu')->delete();
        
        \DB::table('admin_menu')->insert(array (
            0 => 
            array (
                'id' => 1,
                'parent_id' => 0,
                'order' => 1,
                'title' => 'Index',
                'icon' => 'fa-bar-chart',
                'uri' => '/',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'parent_id' => 0,
                'order' => 2,
                'title' => 'Admin',
                'icon' => 'fa-tasks',
                'uri' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'parent_id' => 2,
                'order' => 3,
                'title' => 'Users',
                'icon' => 'fa-users',
                'uri' => 'auth/users',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'parent_id' => 2,
                'order' => 4,
                'title' => 'Roles',
                'icon' => 'fa-user',
                'uri' => 'auth/roles',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'parent_id' => 2,
                'order' => 5,
                'title' => 'Permission',
                'icon' => 'fa-ban',
                'uri' => 'auth/permissions',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'parent_id' => 2,
                'order' => 6,
                'title' => 'Menu',
                'icon' => 'fa-bars',
                'uri' => 'auth/menu',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'parent_id' => 2,
                'order' => 7,
                'title' => 'Operation log',
                'icon' => 'fa-history',
                'uri' => 'auth/logs',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'parent_id' => 0,
                'order' => 0,
                'title' => '海报',
                'icon' => 'fa-bitbucket',
                'uri' => '/haibao',
                'created_at' => '2018-01-06 18:51:49',
                'updated_at' => '2018-01-06 18:51:49',
            ),
            8 => 
            array (
                'id' => 9,
                'parent_id' => 8,
                'order' => 0,
                'title' => '分类管理',
                'icon' => 'fa-align-left',
                'uri' => '/category',
                'created_at' => '2018-01-06 18:52:43',
                'updated_at' => '2018-01-06 18:54:26',
            ),
            9 => 
            array (
                'id' => 10,
                'parent_id' => 8,
                'order' => 0,
                'title' => '用户管理',
                'icon' => 'fa-child',
                'uri' => '/users',
                'created_at' => '2018-01-06 18:54:09',
                'updated_at' => '2018-01-21 08:44:54',
            ),
            10 => 
            array (
                'id' => 11,
                'parent_id' => 8,
                'order' => 0,
                'title' => '图片库',
                'icon' => 'fa-camera',
                'uri' => '/gallery',
                'created_at' => '2018-01-06 18:56:43',
                'updated_at' => '2018-01-06 18:56:43',
            ),
            11 => 
            array (
                'id' => 12,
                'parent_id' => 8,
                'order' => 0,
                'title' => '美文库',
                'icon' => 'fa-book',
                'uri' => '/paragraph',
                'created_at' => '2018-01-06 18:57:41',
                'updated_at' => '2018-01-06 18:59:30',
            ),
            12 => 
            array (
                'id' => 13,
                'parent_id' => 8,
                'order' => 0,
                'title' => 'DIY海报',
                'icon' => 'fa-area-chart',
                'uri' => '/diy',
                'created_at' => '2018-01-06 19:01:17',
                'updated_at' => '2018-01-06 19:01:17',
            ),
            13 => 
            array (
                'id' => 14,
                'parent_id' => 8,
                'order' => 0,
                'title' => '模板管理',
                'icon' => 'fa-calendar',
                'uri' => '/template',
                'created_at' => '2018-01-06 19:02:51',
                'updated_at' => '2018-01-06 19:02:51',
            ),
        ));
        
        
    }
}