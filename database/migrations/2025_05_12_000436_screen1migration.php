<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('screen1')->insert([
            ['id' => 1,  'title' => 'Task 1',  'status' => 'pending', 'notes' => 'Initial task setup', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2,  'title' => 'Task 2',  'status' => 'completed', 'notes' => 'Reviewed', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3,  'title' => 'Task 3',  'status' => 'pending', 'notes' => 'Needs update', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4,  'title' => 'Task 4',  'status' => 'in_progress', 'notes' => 'Started work', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5,  'title' => 'Task 5',  'status' => 'completed', 'notes' => 'Delivered to client', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6,  'title' => 'Task 6',  'status' => 'pending', 'notes' => 'Waiting on approval', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7,  'title' => 'Task 7',  'status' => 'in_progress', 'notes' => 'In development', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8,  'title' => 'Task 8',  'status' => 'pending', 'notes' => 'Created by system', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9,  'title' => 'Task 9',  'status' => 'completed', 'notes' => 'QA passed', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 10, 'title' => 'Task 10', 'status' => 'in_progress', 'notes' => 'Code review scheduled', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 11, 'title' => 'Task 11', 'status' => 'pending', 'notes' => 'Blocked by dependency', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 12, 'title' => 'Task 12', 'status' => 'completed', 'notes' => 'Merged to main', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 13, 'title' => 'Task 13', 'status' => 'pending', 'notes' => 'Need design input', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 14, 'title' => 'Task 14', 'status' => 'in_progress', 'notes' => 'Writing tests', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 15, 'title' => 'Task 15', 'status' => 'pending', 'notes' => 'Reviewed but not approved', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 16, 'title' => 'Task 16', 'status' => 'completed', 'notes' => 'Archived', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 17, 'title' => 'Task 17', 'status' => 'pending', 'notes' => 'Created manually', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 18, 'title' => 'Task 18', 'status' => 'in_progress', 'notes' => 'Ongoing discussion', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 19, 'title' => 'Task 19', 'status' => 'completed', 'notes' => 'Final delivery sent', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 20, 'title' => 'Task 20', 'status' => 'pending', 'notes' => 'To be assigned', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 21, 'title' => 'Task 21', 'status' => 'in_progress', 'notes' => 'Backend dev', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 22, 'title' => 'Task 22', 'status' => 'pending', 'notes' => 'Security review needed', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 23, 'title' => 'Task 23', 'status' => 'completed', 'notes' => 'Client confirmed', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 24, 'title' => 'Task 24', 'status' => 'in_progress', 'notes' => 'Styling phase', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 25, 'title' => 'Task 25', 'status' => 'pending', 'notes' => 'Unassigned', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 26, 'title' => 'Task 26', 'status' => 'completed', 'notes' => 'Tested and deployed', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 27, 'title' => 'Task 27', 'status' => 'pending', 'notes' => 'Estimate required', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 28, 'title' => 'Task 28', 'status' => 'in_progress', 'notes' => 'Syncing with mobile team', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 29, 'title' => 'Task 29', 'status' => 'completed', 'notes' => 'User approved', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 30, 'title' => 'Task 30', 'status' => 'pending', 'notes' => 'Initial draft created', 'created_at' => now(), 'updated_at' => now()],
        ]);
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
