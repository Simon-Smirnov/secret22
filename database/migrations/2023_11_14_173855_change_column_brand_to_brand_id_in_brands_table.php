<?php

use App\Models\Brand;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropColumn('brand');
            $table->foreignIdFor(Brand::class)->after('deleted_at')->constrained();
        });
    }

    public function down(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropConstrainedForeignIdFor(Brand::class);
            $table->string('brand')->after('deleted_at');
        });
    }
};
