<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('leaves', function (Blueprint $table) {
        $table->id();
        $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
        $table->enum('type', ['Casual', 'Sick', 'Earned']);
        $table->date('from_date');
        $table->date('to_date');
        $table->enum('status', ['Pending', 'Approved', 'Rejected'])->default('Pending');
        $table->text('reason')->nullable();
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('leaves');
}

};
