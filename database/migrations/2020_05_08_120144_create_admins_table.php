<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('designation');
            $table->string('contact')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        (new \App\Models\Admin([
            'name'     => 'Native Brains',
            'email'    => 'info@nativebrains.com',
            'password' => bcrypt('123456'),
            'designation'    => 'Manager',
            'contact' => '+923213257111',
            'status'  => 1
        ]))->save();

    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
