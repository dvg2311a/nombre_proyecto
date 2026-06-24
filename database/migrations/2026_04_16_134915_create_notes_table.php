<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string('title', 100)->unique()->index();
            $table->text("content");

            // ? RELACIONES MODERNAS ENTRE TABLAS
            $table->foreignId("category_id")->constrained("categories")
            ->onUpdate("cascade")->onDelete("cascade");

            // ?  category_id int not null
            // ? constrained fk_cat foreign key(category_id)
            //? references categories(id) on delete cascade on update cascade


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
