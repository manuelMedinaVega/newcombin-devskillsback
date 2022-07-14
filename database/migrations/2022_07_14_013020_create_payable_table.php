<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payable', function (Blueprint $table) {
            $table->uuid('bar_code')->primary();
            $table->enum('status', ['pending', 'paid']);
            $table->string('service_type', 100);
            $table->string('service_description', 200);
            $table->date('expires_at');
            $table->double('service_amount', 12, 2, true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payable');
    }
}
