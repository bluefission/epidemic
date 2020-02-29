<?php

use Illuminate\Database\Seeder;
use App\Outbreak\Outbreak;
use App\Outbreak\OutbreakTransmissionType;
use App\Outbreak\OutbreakType;
use App\Outbreak\OutbreakStatus;
use App\Outbreak\Symptom;

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

        foreach ($outbreak_transmission_types as $transmission_type) {
        	OutbreakTransmissionType::create(['name'=>$transmission_type]);
        }

    	$outbreak_types = [
			'Pathogen'
    	];

        foreach ($outbreak_types as $type) {
        	OutbreakType::create(['name'=>$type]);
        }

    	$statuses = [
    		'Active',
			'Endemic',
			'Epidemic',
			'Pandemic',
			'Dormant',
			'Eradicated',
    	];

        foreach ($statuses as $status) {
        	OutbreakStatus::create(['name'=>$status]);
        }

    	$symptoms = [
    		['name'=>'Fever', 'icd10'=>'R50.9', 'description'=>''],
    		['name'=>'Cough', 'icd10'=>'R05', 'description'=>''],
    		['name'=>'Labored Breathing', 'icd10'=>'R06.9', 'description'=>''],
    		['name'=>'Sneezing', 'icd10'=>'R06.7', 'description'=>''],
    		['name'=>'Headache', 'icd10'=>'R51', 'description'=>''],
    	];

        foreach ($symptoms as $symptom) {
        	Symptom::create($symptom);
        }

    	$outbreaks = [
    		[
	            // 'outbreak_type_id' => '',
	            'name' => 'Cold',
	            'icd10' => 'J00',
	            // 'r0_rating' => '',
	            // 'virulence' => '',
	            // 'fatality_rate' => '',
	            // 'zero_day' => '',
	            // 'status_id' => '',
	        ],
			[
	            // 'outbreak_type_id' => '',
	            'name' => 'Flu',
	            'icd10' => 'J10.1',
	            // 'r0_rating' => '',
	            // 'virulence' => '',
	            // 'fatality_rate' => '',
	            // 'zero_day' => '',
	            // 'status_id' => '',
	        ],
			[
	            // 'outbreak_type_id' => '',
	            'name' => 'Covid-19',
	            'icd10' => 'U07.1',
	            // 'r0_rating' => '',
	            // 'virulence' => '',
	            // 'fatality_rate' => '',
	            // 'zero_day' => '',
	            // 'status_id' => '',
	        ],
    	];

        foreach ($outbreaks as $outbreak) {
        	Outbreak::create($outbreak);
        }
    }
}
