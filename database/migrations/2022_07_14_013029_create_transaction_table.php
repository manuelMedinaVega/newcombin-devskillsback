<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->uuid('tax_bar_code')->primary();
            $table->double('amount', 12, 2, true);
            $table->enum('payment_method', ['debit_card', 'credit_card', 'cash']);
            $table->string('card_number', 19)->nullable();
            $table->date('paid_at');

            $table->foreign('tax_bar_code', 'fk_transaction_taxbarcode')
                ->references('bar_code')->on('payable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction');
    }
}
