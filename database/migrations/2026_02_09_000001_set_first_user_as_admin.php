<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        if (DB::getSchemaBuilder()->hasTable ('users')) {
            DB::table('users')
                ->where('id', 1)
                ->whereNull('role')
                ->update(['role' => 'admin']);
        }
    }

    public function down(): void
    {
        if (DB::getSchemaBuilder()->hasTable('users')) {
            DB::table('users')
                ->where('id', 1)
                ->where('role', 'admin')
                ->update(['role' => null]);
        }
    }
};
