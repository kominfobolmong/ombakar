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
            'dashboard-list',
            'menu-list',
            'menu-create',
            'menu-edit',
            'menu-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-show',
            'user-delete',
            'penyalur-list',
            'penyalur-create',
            'penyalur-edit',
            'penyalur-delete',
            'kapal-list',
            'kapal-create',
            'kapal-show',
            'kapal-edit',
            'kapal-delete',
            'surat-permohonan-list',
            'surat-permohonan-create',
            'surat-permohonan-show',
            'surat-permohonan-edit',
            'surat-permohonan-delete',
            'surat-rekomendasi-list',
            'surat-rekomendasi-show',
            'surat-rekomendasi-create',
            'surat-rekomendasi-edit',
            'surat-rekomendasi-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
