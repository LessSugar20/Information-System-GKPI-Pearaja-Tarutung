<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Jemaat;
use App\Models\Sektor;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Database\Seeders\AlkitabSeeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    
     public function run(): void
    {

        $this->call([
            AlkitabSeeder::class,
        ]);

        $role = Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);
        
        $role = Role::create([
            'name' => 'sekretariat',
            'guard_name' => 'web'
        ]);


        $user1 = User::create([
            'id' => '1',
            'username' => 'admin',
            'fullname' => 'admin',
            'password' => Hash::make('admin123')
        ]);
        $user1->assignRole('admin');

        
        $user2 = User::create([
            'id' => '2',
            'username' => 'pengurus1',
            'fullname' => 'pengurus1',
            'password' => Hash::make('pengurus1')
        ]);
        $user2->assignRole('sekretariat');

        // Jemaat::create([
        //     'id' => '1001',
        //     'ayah' => 'rian',
        //     'ibu' => 'shaputra',
        //     'password' => Hash::make('user2')
        // ]);    }

        Sektor::create([
            'id' => '1',
            'nama' => 'Sisingamangaraja',
            'lokasi' => 'siualuompu',
        ]);
        Sektor::create([
            'id' => '2',
            'nama' => 'Kompleks Stadion',
            'lokasi' => 'Sipoholon / Silangkitang',
        ]);
        Sektor::create([
            'id' => '3',
            'nama' => 'Huta Baginda',
            'lokasi' => 'Huta Sumur / Hutabarat',
        ]);
        Sektor::create([
            'id' => '4',
            'nama' => 'Saitnihuta',
            'lokasi' => 'Hutagalung',
        ]);
        Sektor::create([
            'id' => '5',
            'nama' => 'Aeksiansimun',
            'lokasi' => 'Aeksiansimun',
        ]);
        Sektor::create([
            'id' => '6',
            'nama' => 'Rura Pasar',
            'lokasi' => 'Tangsi',
        ]);
        Sektor::create([
            'id' => '7',
            'nama' => 'Hariaranagodang',
            'lokasi' => '--',
        ]);
        Sektor::create([
            'id' => '8',
            'nama' => 'Huta Bagot',
            'lokasi' => 'huta matondang',
        ]);
        Sektor::create([
            'id' => '9',
            'nama' => 'Huta pancuran',
            'lokasi' => 'Huta harambir',
        ]);
        Sektor::create([
            'id' => '10',
            'nama' => 'Sihobuk',
            'lokasi' => 'pearaja',
        ]);
        Sektor::create([
            'id' => '11',
            'nama' => 'Huta tua',
            'lokasi' => '--',
        ]);
        Sektor::create([
            'id' => '12',
            'nama' => 'Sitakka',
            'lokasi' => '--',
        ]);
    }
}
