<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Seed Groups
        $this->call(GroupSeeder::class);
        $this->command->info('The table Groups filled');

        // Seed Users
        $this->call(UserSeeder::class);
        $this->command->info('The table Users filled');

        // Seed Services
        $this->call(ServiceSeeder::class);
        $this->command->info('The table Services filled');

        // Seed Galery
        $this->call(GalerySeeder::class);
        $this->command->info('The Galeries table filled');

        // Seed Contacts
        $this->call(ContactSeeder::class);
        $this->command->info('The Contacts table filled');

        // Seed Slider
        $this->call(SlidetSeeder::class);
        $this->command->info('The Slides table filled');

        // Seed Home
        $this->call((HomeSeeder::class));
        $this->command->info('The Home table filled');
    }
}

class GroupSeeder extends Seeder
{
    public function run()
    {
        // Delete previous data
        DB::table('groups')->delete();

        // Add 2 new rows
        DB::table('groups')->insert([
            'name'    => 'admins',
        ]);

        DB::table('groups')->insert([
            'name'    => 'users',
        ]);
    }
}

class UserSeeder extends Seeder
{
    public function run()
    {
        // Delete previous data
        //DB::table('users')->delete();

        // Get 'admins' ID
        $adminsID = DB::table('groups')->where('name', 'admins')->value('id');

        // Add 1 new rows
        DB::table('users')->insert([
            'name'     => 'root',
            'email'    => 'root@exumple.com',
            'password' => Hash::make('1234'),
            'group_id' => $adminsID,
        ]);
    }
}

class ServiceSeeder extends Seeder
{
    public function run()
    {
        // Delete previous data
        DB::table('services')->delete();

        // Add 2 new rows
        DB::table('services')->insert([
            'title'       => 'Service-1',
            'keywords'    => 'keyword-1',
            'description' => 'description-1',
            'name'        => 'Service-1',
            'text'        => 'Text-1',
            'image'       => 'service-1.jpg',
        ]);

        DB::table('services')->insert([
            'title'       => 'Service-2',
            'keywords'    => 'keyword-2',
            'description' => 'description-2',
            'name'        => 'Service-2',
            'text'        => 'Text-2',
            'image'       => 'service-2.jpg',
        ]);
    }
}

class GalerySeeder extends Seeder
{
    public function run()
    {
        // Delete previous data
        //DB::table('galeries')->delete();

        // Get 'cervicess' ID
        $service1ID = DB::table('services')->where('name', 'Service-1')->value('id');
        $service2ID = DB::table('services')->where('name', 'Service-2')->value('id');

        // Add 4 new rows
        DB::table('galleries')->insert([
            'image'      => 'img-1.jpg',
            'text'       => 'gtext1_service1',
            'service_id' => $service1ID,
        ]);

        DB::table('galleries')->insert([
            'image'      => 'img-2.jpg',
            'text'       => 'gtext2_service1',
            'service_id' => $service1ID,
        ]);

        DB::table('galleries')->insert([
            'image'      => 'img-3.jpg',
            'text'       => 'gtext1_service2',
            'service_id' => $service2ID,
        ]);

        DB::table('galleries')->insert([
            'image'      => 'img-4.jpg',
            'text'       => 'gtext2_service2',
            'service_id' => $service2ID,
        ]);
    }
}

class ContactSeeder extends Seeder
{
    public function run()
    {
        // Delete previous data
        DB::table('contacts')->delete();

        // Add 1 new rows
        DB::table('contacts')->insert([
            'title'       => 'Contacts',
            'keywords'    => 'contacts keywords',
            'description' => 'contacts description',
            'email'       => 'root@exumple.com',
            'phone'       => '+380000000000000',
            'facebook'    => 'http://f',
            'address'     => 'address',
            'image'       => 'blank.jpg',
            'geolocation' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2573.259946091869!2d24.007267076822316!3d49.837573031302334!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473add7847618b2b%3A0xcf2c906aedb8abca!2z0YPQuy4g0KjQtdC_0YLQuNGG0LrQuNGFLCAxMywg0JvRjNCy0L7Qsiwg0JvRjNCy0L7QstGB0LrQsNGPINC-0LHQu9Cw0YHRgtGMLCA3OTAwMA!5e0!3m2!1sru!2sua!4v1715715723290!5m2!1sru!2sua" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
        ]);
    }
}

class SlidetSeeder extends Seeder
{
    public function run()
    {
        // Delete previous data
        DB::table('slides')->delete();

        // Add 2 new rows
        DB::table('slides')->insert([
            'name'     => 'slide-1.jpg',
            'image'    => 'slide_image-1',
            'position' => '1',
        ]);

        DB::table('slides')->insert([
            'name'     => 'slide-2.jpg',
            'image'    => 'slide_image-2',
            'position' => '2',
        ]);
    }
}

class HomeSeeder extends Seeder
{
    public function run()
    {
        // Delete previous data
        DB::table('home')->delete();

        // Add 1 new rows
        DB::table('home')->insert([
            'title'       => 'SvitlanaClinik',
            'keywords'    => 'home keywords',
            'description' => 'home description',
            'text'        => 'home text',
        ]);
    }
}