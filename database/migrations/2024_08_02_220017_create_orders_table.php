<?php

use App\Models\Order;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('ma_don_hang')->unique();
            // unique : khong trùng

            // Lưu trữ thông tin tài khoản đã đặt hàng

            // Tạo khóa ngoại đến bảng users
            // Chỉ chứa id của user đã đặt hàng, để tránh trùng lặp id trong bảng orders và bảng users
            $table->foreignIdFor(User::class)->constrained();

            // Lưu trữ thông tin của người nhận 
            $table->string('ten_nguoi_nhan');
            $table->string('email_nguoi_nhan');
            $table->string('sdt_nguoi_nhan', 10);
            $table->string('dia_chi_nguoi_nhan');
            $table->text('ghi_chu')->nullable();
           
            // Lưu trữ thông tin để quản lý đơn hàng
            $table->string('trang_thai_don_hang')->default(Order::CHO_XAC_NHAN);
            $table->string('trang_thai_thanh_toan')->default(Order::CHUA_THANH_TOAN);

            $table->double('tien_hang');
            $table->double('tien_ship');
            $table->double('tong_tien');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
