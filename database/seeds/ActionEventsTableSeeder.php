<?php /** @noinspection ClassConstantCanBeUsedInspection */

use Illuminate\Database\Seeder;

class ActionEventsTableSeeder extends Seeder
{
    final public function run(): void
    {

        \DB::table('action_events')->delete();

        \DB::table('action_events')->insert([
		    [
		        'actionable_id' => 41,
		        'actionable_type' => 'App\\Models\\Event',
		        'batch_id' => '90a820e2-d40e-43e8-a72a-9330dfac892d',
		        'changes' => '[]',
		        'created_at' => '2020-05-26 19:30:06',
		        'exception' => '',
		        'fields' => '',
		        'id' => 1,
		        'model_id' => 41,
		        'model_type' => 'App\\Models\\Event',
		        'name' => 'Create',
		        'original' => '[]',
		        'status' => 'finished',
		        'target_id' => 15,
		        'target_type' => 'App\\Models\\Event',
		        'updated_at' => '2020-05-26 19:30:06',
		        'user_id' => 1,
		    ],
		    [
		        'actionable_id' => 50,
		        'actionable_type' => 'App\\Models\\Event',
		        'batch_id' => '90a821e9-a156-4db8-b1d5-cab1ac42dbc0',
		        'changes' => '[]',
		        'created_at' => '2020-05-26 19:32:58',
		        'exception' => '',
		        'fields' => '',
		        'id' => 2,
		        'model_id' => 50,
		        'model_type' => 'App\\Models\\Event',
		        'name' => 'Create',
		        'original' => '[]',
		        'status' => 'finished',
		        'target_id' => 28,
		        'target_type' => 'App\\Models\\Event',
		        'updated_at' => '2020-05-26 19:32:58',
		        'user_id' => 1,
		    ],
		    [
		        'actionable_id' => 6,
		        'actionable_type' => 'App\\Models\\Post',
		        'batch_id' => '90a8220a-f935-4e9e-a0d9-8c70f894eda7',
		        'changes' => '{"published_at":"2020-05-21 13:29:41"}',
		        'created_at' => '2020-05-26 19:33:20',
		        'exception' => '',
		        'fields' => '',
		        'id' => 3,
		        'model_id' => 6,
		        'model_type' => 'App\\Models\\Post',
		        'name' => 'Create',
		        'original' => '{"published_at":"2020-05-21T13:29:41.000000Z"}',
		        'status' => 'finished',
		        'target_id' => 6,
		        'target_type' => 'App\\Models\\Post',
		        'updated_at' => '2020-05-26 19:33:20',
		        'user_id' => 1,
		    ],
		]);

    }
}
