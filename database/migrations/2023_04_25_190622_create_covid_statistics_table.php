<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('covid_statistics', function (Blueprint $table) {
			$table->id();
			$table->string('country_code');
			$table->json('country');
			$table->mediumInteger('confirmed')->default(0)->unsigned();
			$table->mediumInteger('recovered')->default(0)->unsigned();
			$table->mediumInteger('deaths')->default(0)->unsigned();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('covid_statistics');
	}
};
