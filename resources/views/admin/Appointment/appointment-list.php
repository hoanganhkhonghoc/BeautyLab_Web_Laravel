<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-9 col-md-8">
                <div class="card bg-white">
                    <div class="card-body">
                        <div id="calendar">
                            <div width="50%" style="text-align: center;">
                                <h3 class="modal-title">Lịch hẹn tháng <?php echo $_GET['month']; ?></h3>
                            </div>
                            <div width="50%" style="text-align: left;">
                                <form action="index.php?c=appointment&a=xl_xemlich" method="POST">
                                    <select name="month">
                                        <option value=<?php echo $data['date']['mon']; ?> <?php if ($_GET['month'] == $data['date']['mon']) {
                                                                                                echo 'selected';
                                                                                            } ?>>Tháng <?php echo $data['date']['mon']; ?></option>
                                        <option value=<?php echo ($data['date']['mon'] + 1); ?> <?php if ($_GET['month'] == ($data['date']['mon'] + 1)) {
                                                                                                    echo 'selected';
                                                                                                } ?>>Tháng <?php echo ($data['date']['mon'] + 1); ?></option>
                                    </select>
                                    <button name="submit" type="submit">Xem</button>
                                </form>
                                <br>
                                <table>
                                    <?php $a = 1;
                                    for ($i = 1; $i < 6; $i++) { ?>
                                        <tr>
                                            <?php for ($j = 1; $j < 7; $j++) { ?>
                                                <td><button style="text-align:center;width: 100px;height:100px;<?php if ($data['date']['mday'] == $a && $data['date']['mon'] == $_GET['month']) {
                                                                                                                    echo 'background-color:#CCFF99;';
                                                                                                                } ?>" id="hieuung" onclick="location.href='index.php?c=appointment&a=show&day=<?php echo $a; ?>&month=<?php echo $data['date']['mon']; ?>'"><?php echo $a; ?></button></td>
                                            <?php $a++;
                                            } ?>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>