<?php

use Illuminate\Database\Seeder;
use App\Account\User;
use App\Account\Account;
use App\Account\AccountType;
use App\Account\AccountMetaType;
use App\Account\AccountMetaCategory;
use App\Account\PrivacyLevel;

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

        $admin_type = AccountType::where('name', 'user')->first();

        $account = Account::create([
        	'user_id' => $user->id,
        	'account_type_id'=>$admin_type->id,
            'first_name' => 'Demo',
            'last_name' => 'User',
            'entitlements' => 'superuser'
        ]);

        $account_meta_types = ['Profile'];
        $account_meta_categories = ['Demographic'];
        $privacy_levels = ['Private', 'Public'];

        foreach ( $account_meta_types as $type ) {
        	AccountMetaType::create(['name'=>$type, 'description'=>'']);
        }

        foreach ( $account_meta_categories as $category ) {
        	AccountMetaCategory::create(['name'=>$category, 'description'=>'']);
        }

        foreach ( $privacy_levels as $level ) {
        	PrivacyLevel::create(['name'=>$level, 'description'=>'']);
        }
    }
}
