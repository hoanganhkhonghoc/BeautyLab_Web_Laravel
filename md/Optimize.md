format code:

// 1. Select
select chuyền bằng mảng ví dụ cần select 2 trường client.*, client.name thì chuyển thành viết
select([
    "client.*",
    "client.name",
])

// 2. Chuyền Data
Chuyền data vào view bình thường chuyền 2 biến $data["product"] và $data["client"]
Cách 1: 
    return view("/link" , ['data' => $data]);

    Ưu điểm:
    - Gọi code vì sử dụng mảng
    - Gắn gọn khi đưa sang view không bị loạn
    Nhược điểm:
    - Khó dùng vì tính logic cao -> mảng 2 chiều 
    - Sai 1 mảng chiều thứ 2 sẽ ảnh hưởng toàn bộ 

Cách 2:
    return view("/link" , [
        "product" => $data["product"],
        "client"  => $data["client"],
    ])

    Ưu điểm:
    - Gọi code sẽ phải đặt tên đúng và tên biểu hiện chức năng
    Nhược điểm:
    - Khi chuyền sang view phải chú ý tới biến đã đặt


// 3. Nghiệp vụ

chú ý:
- bên admin: 
    + Đơn hàng cũ luôn đưa lên đầu -> (phải xử lý đơn hàng cũ trước khi xử lý đơn hàng mới)

- bên Site:
    + Đơn hàng mới hay bất kì sản phẩm mới nào được thêm vào giỏ hàng đều phải hiển thị lên trước

- Cả 2 Site và Admin
    + Sản phẩm mới, danh mục, thông báo, bình luận, ... mới đều đưa lên trước