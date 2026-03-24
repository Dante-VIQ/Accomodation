<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMissingFieldsToServicesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            // Check if column doesn't exist before adding
            if (!Schema::hasColumn('services', 'category')) {
                $table->string('category')->nullable()->after('description');
            }
            
            if (!Schema::hasColumn('services', 'price')) {
                $table->decimal('price', 10, 2)->nullable()->after('category');
            }
            
            if (!Schema::hasColumn('services', 'price_unit')) {
                $table->string('price_unit')->default('/person')->after('price');
            }
            
            if (!Schema::hasColumn('services', 'duration')) {
                $table->string('duration')->nullable()->after('price_unit');
            }
            
            if (!Schema::hasColumn('services', 'group_size')) {
                $table->integer('group_size')->nullable()->after('duration');
            }
            
            if (!Schema::hasColumn('services', 'features')) {
                $table->json('features')->nullable()->after('group_size');
            }
            
            if (!Schema::hasColumn('services', 'is_popular')) {
                $table->boolean('is_popular')->default(false)->after('features');
            }
            
            if (!Schema::hasColumn('services', 'full_description')) {
                $table->text('full_description')->nullable()->after('is_popular');
            }
            
            if (!Schema::hasColumn('services', 'display_order')) {
                $table->integer('display_order')->default(0)->after('full_description');
            }
            
            if (!Schema::hasColumn('services', 'is_active')) {
                $table->boolean('is_active')->default(true)->after('display_order');
            }
            
            // Add indexes for better performance
            $table->index('category');
            $table->index('is_active');
            $table->index('display_order');
            $table->index('is_popular');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $columns = [
                'category',
                'price',
                'price_unit',
                'duration',
                'group_size',
                'features',
                'is_popular',
                'full_description',
                'display_order',
                'is_active'
            ];
            
            foreach ($columns as $column) {
                if (Schema::hasColumn('services', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
}