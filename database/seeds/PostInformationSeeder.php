<?php

use Illuminate\Database\Seeder;

class PostInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $postsInformation = factory(App\PostInformation::class,20)->create();

        foreach($postsInformation as $postInformation){
            $postInformation->slug = $postInformation->id;
            $postInformation->save();
        }
    }
}
