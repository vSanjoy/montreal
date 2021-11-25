<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfolioServiceMappingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolio_service_mappings', function (Blueprint $table) {
            $table->integer('portfolio_id')->nullable()->comment('Id from portfolios table');
            $table->integer('service_id')->nullable()->comment('Id from services table');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('portfolio_service_mappings');
    }
}
