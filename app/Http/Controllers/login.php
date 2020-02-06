<?php 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
class login extends Controller
{
    public function index(){
        return "Halo ini adalah method index, dalam controller DosenController. - www.malasngoding.com";
    }
}
?>
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class login extends Controllers
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function login()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
?>