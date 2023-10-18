<!-- Thẻ button để tăng giá trị -->
<button id="incrementValueButton">Increment Value</button>

<script>
    document.getElementById('incrementValueButton').addEventListener('click', function () {
        // Lấy giá trị hiện tại từ view A
        let currentValue = parseInt(window.opener.document.getElementById('valueInput').value);

        // Tăng giá trị
        let newValue = currentValue + 1;

        // Cập nhật giá trị thẻ input trên view A
        window.opener.document.getElementById('valueInput').value = newValue;

        // Trả về giá trị mới thông qua JSON để view A có thể cập nhật nếu cần
        window.opener.postMessage({ newValue: newValue }, '*');

        // Đóng cửa sổ popup
        window.close();
    });
</script>
