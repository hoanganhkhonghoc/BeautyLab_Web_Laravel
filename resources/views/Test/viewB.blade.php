<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ViewB</title>
</head>
<body>
    <input type="text" id="valueInput" value="0">
    <a href="/test" target="_blank"> here</a>
    <script>
        // Lắng nghe message được gửi từ viewA
        window.addEventListener('message', function (event) {
            // Kiểm tra xem message có đến từ viewA hay không
            if (event.origin === 'http://localhost:8000') {
                // Cập nhật giá trị thẻ input trên view B
                document.getElementById('valueInput').value = event.data.newValue;
            }
        });
    </script>
</body>
</html>