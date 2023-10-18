<!-- Thẻ input -->
<input type="text" id="valueInput" value="0">

<!-- Nút để gửi yêu cầu tới view B -->
<button id="incrementButton">Increment Value</button>

<script>
    document.getElementById('incrementButton').addEventListener('click', function () {
        // Gửi yêu cầu AJAX tới view B để tăng giá trị
        fetch('/increment-value')
            .then(response => response.json())
            .then(data => {
                // Cập nhật giá trị thẻ input trên view A
                document.getElementById('valueInput').value = data.newValue;
            });
    });
</script>
