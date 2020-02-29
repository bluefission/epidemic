<?php

use Illuminate\Database\Seeder;

class OutbreakTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	$outbreak_transmission_types = [
			'Aerosol',
			'Direct Contact',
			'Oral',
			'Vector',
			'Fomite'
    	];

    	$outbreak_types = [
			'Pathogen'
    	];

    	$statuses = [
    		'Active',
			'Endemic',
			'Epidemic',
			'Pandemic',
			'Dormant',
			'Eradicated',
    	];

    	$symptoms = [
    		['name'=>'', 'icd10'=>''],
    		['name'=>'', 'icd10'=>''],
    		['name'=>'', 'icd10'=>''],
    		['name'=>'', 'icd10'=>''],
    	];

    	$outbreaks = [
    		[
	            'parent_type_id' => '',
	            'outbreak_type_id' => '',
	            'name' => '',
	            'icd10' => '',
	            'r0_rating' => '',
	            'virulence' => '',
	            'fatality_rate' => '',
	            'zero_day' => '',
	            'status_id' => '',
	        ],
			[
	            'parent_type_id' => '',
	            'outbreak_type_id' => '',
	            'name' => '',
	            'icd10' => '',
	            'r0_rating' => '',
	            'virulence' => '',
	            'fatality_rate' => '',
	            'zero_day' => '',
	            'status_id' => '',
	        ],
    	];

        Outbreak::create();
    }
}
