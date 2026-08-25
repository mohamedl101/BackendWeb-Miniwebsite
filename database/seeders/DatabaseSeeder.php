<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Motorcycle;
use App\Models\TestRideRequest;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin 
        $admin = User::create([
            'name'     => 'Admin',
            'email'    => 'admin@example.com',
            'password' => Hash::make('password'),
            'role'     => 'admin',
        ]);

        // Klanten
        $customer1 = User::create([
            'name'     => 'Jan Janssen',
            'email'    => 'jan@example.com',
            'password' => Hash::make('password'),
            'role'     => 'customer',
        ]);

        //  Merken
        $honda    = Brand::create(['name' => 'Honda',        'country' => 'Japan',      'description' => 'Betrouwbare Japanse motoren voor elk rijtype.']);
        $yamaha   = Brand::create(['name' => 'Yamaha',       'country' => 'Japan',      'description' => 'Innovatieve motorfietsen met sportief karakter.']);
        $ducati   = Brand::create(['name' => 'Ducati',       'country' => 'Italië',     'description' => 'Italiaanse prestatiemotoren met iconisch design.']);
        $bmw      = Brand::create(['name' => 'BMW Motorrad', 'country' => 'Duitsland',  'description' => 'Premium motoren voor touring en sport.']);
        $kawasaki = Brand::create(['name' => 'Kawasaki',     'country' => 'Japan',      'description' => 'Krachtige motoren met groene identiteit.']);

        // Motors 
        $motorsData = [
            [$honda,    'CB500F',       'naked',   7299,  471,  1, 'Instapmodel naked bike, perfect voor beginners en gevorderden.'],
            [$honda,    'CBR1000RR-R',  'sport',   28999, 999,  1, 'Superbike klasse met MotoGP technologie.'],
            [$honda,    'Africa Twin',  'touring', 14999, 1084, 1, 'Adventure tourer voor de echte avonturier.'],
            [$yamaha,   'MT-07',        'naked',   8299,  689,  1, 'Veelzijdige naked bike met levendig karakter.'],
            [$yamaha,   'YZF-R1',       'sport',   24999, 998,  1, 'Superbike met crossplane-motor voor maximale prestaties.'],
            [$yamaha,   'Ténéré 700',   'offroad', 11499, 689,  1, 'Avontuurlijke off-road motor met Dakar-spirit.'],
            [$ducati,   'Panigale V4',  'sport',   32990, 1103, 1, 'Italiaans meesterwerk, geïnspireerd op het MotoGP-circuit.'],
            [$ducati,   'Monster 937',  'naked',   13990, 937,  1, 'Iconische naked motor met modern Ducati-design.'],
            [$bmw,      'R 1250 GS',    'touring', 19990, 1254, 1, 'De ultieme toermotor voor wereldreizigers.'],
            [$bmw,      'S 1000 RR',    'sport',   24990, 999,  1, 'Superbike benchmark met ShiftCam technologie.'],
            [$kawasaki, 'Z900',         'naked',   9299,  948,  1, 'Krachtige naked bike met agressief design.'],
            [$kawasaki, 'Ninja ZX-10R', 'sport',   19999, 998,  1, 'Superbike voor circuit en straat.'],
            [$kawasaki, 'Versys 650',   'touring', 8799,  649,  1, 'Veelzijdige adventure tourer voor dagelijks gebruik.'],
        ];

        $createdMotos = [];
        foreach ($motorsData as [$brand, $name, $type, $price, $cc, $stock, $desc]) {
            $createdMotos[] = Motorcycle::create([
                'brand_id'    => $brand->id,
                'name'        => $name,
                'type'        => $type,
                'price'       => $price,
                'cc'          => $cc,
                'stock'       => $stock,
                'description' => $desc,
                'image_url'   => null,
            ]);
        }

        // Testrit-aanvragen 
        TestRideRequest::create([
            'user_id'       => $customer1->id,
            'motorcycle_id' => $createdMotos[0]->id,
            'desired_date'  => now()->addDays(5)->toDateString(),
            'comment'       => 'Ik wil graag de CB500F uitproberen.',
            'status'        => 'pending',
        ]);

        TestRideRequest::create([
            'user_id'       => $customer1->id,
            'motorcycle_id' => $createdMotos[6]->id,
            'desired_date'  => now()->addDays(10)->toDateString(),
            'comment'       => null,
            'status'        => 'approved',
        ]);

        TestRideRequest::create([
            'user_id'       => $customer2->id,
            'motorcycle_id' => $createdMotos[3]->id,
            'desired_date'  => now()->addDays(3)->toDateString(),
            'comment'       => 'Ik wil graag de MT-07 uitproberen.',
            'status'        => 'rejected',
        ]);

        TestRideRequest::create([
            'user_id'       => $customer2->id,
            'motorcycle_id' => $createdMotos[8]->id,
            'desired_date'  => now()->addDays(14)->toDateString(),
            'comment'       => 'Ik wil graag de R 1250 GS uitproberen.',
            'status'        => 'pending',
        ]);
    }
}
