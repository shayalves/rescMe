<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('device_locations_new', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('device_id')->constrained()->cascadeOnDelete();
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
            $table->float('accuracy')->nullable();
            $table->timestamp('recorded_at')->useCurrent();
            $table->timestamps();
        });

        DB::table('device_locations')->orderBy('id')->each(function (object $location) {
            $row = (array) $location;
            $row['id'] = (string) Str::uuid7();

            DB::table('device_locations_new')->insert($row);
        });

        Schema::drop('device_locations');
        Schema::rename('device_locations_new', 'device_locations');

        Schema::table('device_locations', function (Blueprint $table) {
            $table->index(['device_id', 'recorded_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('device_locations_old', function (Blueprint $table) {
            $table->id();
            $table->foreignId('device_id')->constrained()->cascadeOnDelete();
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
            $table->float('accuracy')->nullable();
            $table->timestamp('recorded_at')->useCurrent();
            $table->timestamps();
        });

        DB::table('device_locations')->orderBy('created_at')->each(function (object $location) {
            $row = (array) $location;
            unset($row['id']);

            DB::table('device_locations_old')->insert($row);
        });

        Schema::drop('device_locations');
        Schema::rename('device_locations_old', 'device_locations');

        Schema::table('device_locations', function (Blueprint $table) {
            $table->index(['device_id', 'recorded_at']);
        });
    }
};
