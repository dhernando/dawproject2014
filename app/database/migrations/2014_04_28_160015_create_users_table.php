<?php
 
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
 
class CreateUsersTable extends Migration {
 
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('username');
            $table->string('email');
            $table->string('password');
            $table->string('nombre');
            $table->string('apellido');
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
        Schema::drop('usuarios');
    }
 
}

class UserTableSeeder extends Seeder {
 
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vader = DB::table('usuarios')->insert([
                'username'   => 'doctorv',
                'email'      => 'darthv@deathstar.com',
                'password'   => Hash::make('thedarkside'),
                'nombre' => 'Darth',
                'apellido'  => 'Vader',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
 
        DB::table('usuarios')->insert([
                'username'   => 'goodsidesoldier',
                'email'      => 'lightwalker@rebels.com',
                'password'   => Hash::make('hesnotmydad'),
                'nombre' => 'Luke',
                'apellido'  => 'Skywalker',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
 
        DB::table('usuarios')->insert([
                'username'   => 'greendemon',
                'email'      => 'dancingsmallman@rebels.com',
                'password'   => Hash::make('yodaIam'),
                'nombre' => 'Yoda',
                'apellido'  => 'Unknown',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
    }
 
}