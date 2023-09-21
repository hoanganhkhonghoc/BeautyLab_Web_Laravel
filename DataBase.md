// cần vẽ ERD thật chính xác (bảng cột không quan trọng) 
// quan trọng xác định mối quan hệ giữa các bảng

// migrations -> được xác định thằng nào tạo trước thằng nào bởi tên
// VD: 2023_09_17_164518
// chỉnh sửa ngày tháng tạo để biết thằng nào trước thằng nào sau

// quan hệ 1-1 VD client và cart 
// 1 tài khoản chỉ có 1 giỏ hàng
// 1 giỏ hàng chỉ có bởi 1 tài khoản
// $table->unsignedBigInteger("client_id")->unsigned()->nullable()->unique();