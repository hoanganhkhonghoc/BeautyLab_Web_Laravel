// view admin và view site
// admin (trang quản trị) -> css , js của public/admin
// site (trang người dùng) -> css, js của public/site

// route -> web.php 
// admin -> routers/admin
// site  -> routers/site

// view -> resources/views
// admin -> resources/views/admin
// site -> resources/views/site

// model không cần chia phân quyền

// controller -> app/Http/Controllers
// admin -> app/Http/Controllers/admin
// site  -> app/Http/Controllers/site

// public -> nơi chứa css, js, img, icon, ...
// img: hình ảnh (sẽ dùng chung cho cả admin và site) -> public/img

// .env (file định nghĩa DataBase)
// DB_DATABASE=hoanganh (dòng 14) định nghĩa tên DataBase của project 

// view trong laravel -> php, html, txt -> .blade.php 

// view() : đường dẫn mặc định đi vào views truyền tên view không cần .blade.php
// asset() : đường dẫn mặc định đi vào public 
// @include() : đường dẫn mặc định đi vào view giống như view()
// khác nhau:
// 1. view nó trả về view -> 
// 2. @include coppy thằng bên trong

// chạy thử view -> 
// 1. nếu chạy thử master layout -> không cần view nội dung
// 2. nếu chạy thử view nội dung -> cần view master layout

// chạy thử cách 1:  tách master layout thành  trang khác nhau để quản lý
// chạy thử cách 2:  gọi lại master layout 