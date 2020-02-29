<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Account;
use App\AccountTypes;
use App\AccountMetaTypes;
use App\AccountMetaCategory;
use App\PrivacyLevel;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::create([
            'name' => 'admin',
            'email' => env('ADMIN_EMAIL'),
            'password' => bcrypt(env('ADMIN_PASSWORD', 'password'))
        ]);

        $account_types = [
			[
	            'name' => 'administrator',
	            'description' => '',
	        ],
			[
	            'name' => 'user',
	            'description' => '',
	        ],
        ];

        foreach ( $account_types as $type ) {
        	AccountType::create($type);
        }

        $admin_type = AccountType::where('name', 'user')->get();

        $account = Account::create([
        	'user_id' => $user->id,
        	'account_type_id'=>$admin_type->id,
            'first_name' => 'admin',
            'last_name' => env('ADMIN_EMAIL'),
            'entitlements' => bcrypt(env('ADMIN_PASSWORD', 'password'))
        ]);

        $account_meta_types = [];
        $account_meta_categories = [];
        $privacy_levels = [];

        foreach ( $account_meta_types as $type ) {
        	AccountMetaType::create(['name'=>$type]);
        }

        foreach ( $account_meta_categories as $category ) {
        	AccountMetaCategory::create(['name'=>$category]);
        }

        foreach ( $privacy_levels as $level ) {
        	PrivacyLevel::create(['name'=>$level]);
        }
    }
}
