<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesDatabaseSeeder extends Seeder
{
    public function run()
    {
       // $owner = new Role();
       // $owner->name  = 'owner';
       // $owner->display_name = 'product owner';
       // $owner->description = 'user isthe owner of a given project';
       // $owner->save();


       $owner = new Role();
       $owner->name  = 'tuantran';
       $owner->display_name = 'tuan user';
       $owner->description = 'user isthe owner of a given project';
       $owner->save();
    }
}
