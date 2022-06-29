<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'admin-dashboard',
            'artist-index',
            'artist-create',
            'artist-edit',
            'artist-delete',
            'venue-index',
            'venue-create',
            'venue-edit',
            'venue-delete',
            'ticket-index',
            'ticket-create',
            'ticket-edit',
            'ticket-delete',
            'order-list',
            'user-index',
            'user-create',
            'user-edit',
            'user-delete',
            'roles-index',
            'roles-create',
            'roles-edit',
            'roles-delete',
         ];
      
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}
