// $_SESSION[] -> sử dụng như nào
// 1 khi SESSION sinh ra nó chỉ mất đi khi đóng tab chương trình hoặc unset($_SESSION)

// unset() : xoá biến

// isset() : kiểm tra có tồn tại không
// empty() : kiểm tra có rỗng hay không

// $_SESSION['data'] -> isset() -> true  | empty() -> không có giá trị được hiểu = null -> true
// $_SESSION['data'] = 1 => isset() -> true | empty() -> false

// $_SESSION['data'] = 1        -> isset() -> true  | empty() -> false
// unset($_SESSION['data'])     -> isset() -> false | empty() -> false thậm trí lỗi


// trong laravel $_SESSION đổi thành session(["tên" => "dữ liệu"]);
// VD: $_SESSION['account'] = 1; -> session(["account" => 1]);
// VD: $_SESSION['account']['level'] = 1; -> session(["account.level" => 1]);

// trong laravel isset() không sử dụng trong router mà sẽ sử dụng kiểm tra có tồn tại hay không ở session
// VD: để kiểm tra $_SESSION['account'] có tồn tại hay không
// thay vì dùng isset($_SESSION['account']) thì mình dùng session()->has("account")

// trong laravel unset() không sử dụng trong router mà sẽ dụng trong session
// VD: muốn xoá $_SESSION['account']['level']
// thay vì dùng unset($_SESSION['account']['level']) thì mình dùng session()->forget('account.level');