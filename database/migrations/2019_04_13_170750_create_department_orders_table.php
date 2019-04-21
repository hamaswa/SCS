<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_orders', function (Blueprint $table) {
            $table->bigInteger('department_id')->unsigned();
            $table->bigInteger('order_id')->unsigned();

            //FOREIGN KEY CONSTRAINTS
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');

//SETTING THE PRIMARY KEYS
            $table->primary(['department_id','order_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('department_orders');
    }
}
