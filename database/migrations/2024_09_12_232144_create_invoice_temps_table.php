<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_temps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->string('student_name');
            $table->string('invoice_id');
            $table->date('issue_date')->nullable();
            $table->date('due_date')->nullable();
            $table->decimal('total_amount', 10, 2)->default(0.00);
            $table->decimal('amount_paid', 10, 2)->default(0.00);
            $table->decimal('balance_due', 10, 2)->default(0.00);
            $table->decimal('tax_amount', 10, 2)->default(0.00);
            //invoice status
            $table->enum('status', ['Pending', 'Issued', 'Issued_Overdue',
            'Paid', 'Paid_Partial', 'Paid_Late', 'Cancelled', 'Refunded']);
            //payment method
            $table->string('payment_method')->nullable();
            $table->string('notes')->nullable();
            //payment
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_temps');
    }
}