<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
<<<<<<< HEAD
use App\User;

=======
>>>>>>> c2a77aa999cb3655bbfc55932af72511ebe94018

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->string('username');
            $table->string('email');
            $table->string('password');
            $table->integer('id_role');
            $table->timestamps();
        });

        $hash = Hash::make(env('DEFAULT_PASSWORD'));

        User::create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => $hash,
            'id_role' => '1'
        ]);
=======
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
>>>>>>> c2a77aa999cb3655bbfc55932af72511ebe94018
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
