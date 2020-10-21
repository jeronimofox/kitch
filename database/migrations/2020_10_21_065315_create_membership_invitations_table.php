<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membership_invitations', function (Blueprint $table) {
            $table->id();
            $table->string('membership_entity');
            $table->foreignIdFor(User::class)->name('sender_id');
            $table->foreignIdFor(User::class)->name('target_id');
            $table->unsignedBigInteger('entity_id');
            $table->boolean('has_accepted')->default(false);
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
        Schema::dropIfExists('membership_invitations');
    }
}
