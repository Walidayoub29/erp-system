<?php

use Illuminate\Database\Migrations\Migration;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::connection('mongodb')->create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('client_email');
            $table->date('quotation_date');
            $table->date('expiration_date')->nullable();
            $table->text('description');
            $table->decimal('amount', 10, 2);
            $table->string('status')->default('draft'); // e.g., draft, sent, accepted, rejected
            $table->string('product_description');
            $table->integer('quantity');
            $table->integer('delivered');
            $table->integer('invoiced');
            $table->decimal('unit_price', 10, 2);
            $table->decimal('taxes', 10, 2);
            $table->decimal('tax_excl', 10, 2);
            $table->decimal('untaxed_amount', 10, 2);
            $table->decimal('vat_9', 10, 2);
            $table->decimal('total', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::connection('mongodb')->dropIfExists('quotations');
    }
}

