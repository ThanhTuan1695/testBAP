<?php

use Illuminate\Database\Seeder;
use App\Permission;


class PermissionsDatabaseSeeder extends Seeder
{
    public function run()
    {
        $createPost = new Permission();
		$createPost->name         = 'create-post';
		$createPost->display_name = 'Create Posts'; // optional
		// Allow a user to...
		$createPost->description  = 'create new blog posts'; // optional
		$createPost->save();

		$editUser = new Permission();
		$editUser->name         = 'edit-user';
		$editUser->display_name = 'Edit Users'; // optional
		// Allow a user to...
		$editUser->description  = 'edit existing users'; // optional
		$editUser->save();

		$deleteUser = new Permission();
		$deleteUser->name         = 'delete-user';
		$deleteUser->display_name = 'delete Users'; // optional
		// Allow a user to...
		$deleteUser->description  = 'delete existing users'; // optional
		$deleteUser->save();
	 }
}
