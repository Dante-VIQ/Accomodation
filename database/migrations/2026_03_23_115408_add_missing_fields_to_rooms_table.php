<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddMissingFieldsToRoomsTable extends Migration
{
    public function up(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            // Check and add missing columns
            if (!Schema::hasColumn('rooms', 'category')) {
                $table->string('category')->nullable()->after('type');
            }
            
            if (!Schema::hasColumn('rooms', 'size')) {
                $table->string('size')->nullable()->after('category');
            }
            
            if (!Schema::hasColumn('rooms', 'capacity')) {
                $table->integer('capacity')->default(2)->after('size');
            }
            
            if (!Schema::hasColumn('rooms', 'bed_type')) {
                $table->string('bed_type')->nullable()->after('capacity');
            }
            
            if (!Schema::hasColumn('rooms', 'badge')) {
                $table->string('badge')->nullable()->after('bed_type');
            }
            
            if (!Schema::hasColumn('rooms', 'best_season')) {
                $table->string('best_season')->nullable()->after('badge');
            }
            
            if (!Schema::hasColumn('rooms', 'amenities')) {
                $table->json('amenities')->nullable()->after('best_season');
            }
            
            if (!Schema::hasColumn('rooms', 'images')) {
                $table->json('images')->nullable()->after('amenities');
            }
            
            if (!Schema::hasColumn('rooms', 'rating')) {
                $table->decimal('rating', 3, 2)->default(5.0)->after('images');
            }
            
            if (!Schema::hasColumn('rooms', 'review_count')) {
                $table->integer('review_count')->default(0)->after('rating');
            }
            
            if (!Schema::hasColumn('rooms', 'is_popular')) {
                $table->boolean('is_popular')->default(false)->after('review_count');
            }
            
            if (!Schema::hasColumn('rooms', 'is_featured')) {
                $table->boolean('is_featured')->default(false)->after('is_popular');
            }
            
            if (!Schema::hasColumn('rooms', 'display_order')) {
                $table->integer('display_order')->default(0)->after('is_featured');
            }
            
            if (!Schema::hasColumn('rooms', 'is_active')) {
                $table->boolean('is_active')->default(true)->after('display_order');
            }
            
            // Add indexes
            $table->index('category');
            $table->index('type');
            $table->index('is_active');
            $table->index('is_popular');
            $table->index('is_featured');
            $table->index('display_order');
            $table->index('price');
        });
        
        // Update existing records with default values
        $this->updateExistingRecords();
    }
    
    private function updateExistingRecords(): void
    {
        // Set category based on type if not set
        DB::table('rooms')->whereNull('category')->update([
            'category' => DB::raw('CASE 
                WHEN type = "presidential" THEN "Presidential"
                WHEN type = "safari" THEN "Safari"
                WHEN type = "garden" THEN "Garden"
                ELSE "Executive"
            END')
        ]);
        
        // Set default amenities if null
        DB::table('rooms')->whereNull('amenities')->update([
            'amenities' => json_encode(['Wi-Fi', 'Air Conditioning', 'Smart TV', 'Mini Bar', 'Room Service'])
        ]);
        
        // Set default images if null
        DB::table('rooms')->whereNull('images')->update([
            'images' => json_encode([])
        ]);
        
        // Set default values for other fields
        DB::table('rooms')->whereNull('size')->update(['size' => '50 sqm']);
        DB::table('rooms')->whereNull('bed_type')->update(['bed_type' => 'King-size bed']);
        DB::table('rooms')->whereNull('badge')->update(['badge' => 'Luxury Suite']);
        
        // Set display_order based on id
        $rooms = DB::table('rooms')->orderBy('id')->get();
        foreach ($rooms as $index => $room) {
            if ($room->display_order == 0) {
                DB::table('rooms')
                    ->where('id', $room->id)
                    ->update(['display_order' => $index + 1]);
            }
        }
    }

    public function down(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            $columns = [
                'category', 'size', 'capacity', 'bed_type', 'badge', 'best_season',
                'amenities', 'images', 'rating', 'review_count', 'is_popular',
                'is_featured', 'display_order', 'is_active'
            ];
            
            foreach ($columns as $column) {
                if (Schema::hasColumn('rooms', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
}