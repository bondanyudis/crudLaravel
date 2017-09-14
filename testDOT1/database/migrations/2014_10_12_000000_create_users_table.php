<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Link;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('cruds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('alamat');
            $table->string('telepon')->unique();
            $table->rememberToken();
            $table->timestamps();
        });
         Link::create([
            'nama' => 'yudis',
            'alamat' => 'gajayana',
            'telepon' => '03141768766'
        ]);
 
        Link::create([
             'nama' => 'yudistira',
            'alamat' => 'gajayana',
            'telepon' => '03988678766'
        ]);
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
