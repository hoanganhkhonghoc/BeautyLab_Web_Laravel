// phân quyền ban đầu php thuần (ngôn ngữ lập trình php) $_SESSION hoặc session() 
// có tích hợp sẵn phân quyền khác (Auth) Middleware


// Phân quyền của mình dựa vào ss để biết chính xác nó nằm ở đâu
// -> Đi từ đâu ?? 
// Không có quyền chưa đăng nhập -> site
// Khi đăng nhập thì mới kiểm tra quyền -> site / admin

// Nếu ERD chỉ có 1 bảng tài khoản thì không cần xử lý nhiều 
// Nếu ERD có 2 bảng chứa tài khoản thì cần phải chú ý:

// bài này hiện tại vd là 3 bảng account (nơi chứa tài khoản admin -> chủ của chủ), 
// staff (nơi chứa tài khoản nhân viên), client (nơi chứa tài khoản người dùng)

// Hiện tại vd 1 bảng để phân quyền (gọi bảng trên Database là taikhoan)
// Quay về xử lý 3 bảng

// vào Auth để định nghĩa cho project của mình
// phân quyền theo form đang nhập

// khi đăng nhập trên laravel nó yêu cầu tính bảo mật cao vì vậy khi thêm dữ liệu vào database như mật khẩu thì phải đổi sang bcrypt()

// 