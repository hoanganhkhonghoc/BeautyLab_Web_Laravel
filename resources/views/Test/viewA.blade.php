<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ViewA</title>
</head>
<body>
    <?php dump(window()->opener()); ?>
    <button id="incrementValueButton" target="_blank">Increment Value</button>
    
    <script>
        console.log(window.opener);
        // Lắng nghe sự kiện click của button
        document.getElementById('incrementValueButton').addEventListener('click', function () {
            // Kiểm tra xem đối tượng window.opener có null hay không
            if (window.opener) {
                // Lấy giá trị hiện tại từ view A
                let currentValue = parseInt(window.opener.document.getElementById('valueInput').value);

                // Tăng giá trị
                let newValue = currentValue + 1;

                // Trả về giá trị mới thông qua JSON
                window.opener.postMessage({ newValue: newValue }, '*');
            } else {
                // Xử lý đối tượng window.opener null
                console.log('window.opener is null');
            }
        });
    </script>
</body>
</html>