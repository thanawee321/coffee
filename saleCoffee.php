<?php

session_start();
require 'connection/connect.php';
require 'checkSession.php';
include 'command.php';

$query_product_coffee_sale = "SELECT product_coffee.id_product,product_coffee.coffee_product,product_coffee.hot_price,product_coffee.ice_price,status_coffee.status FROM product_coffee 
                              INNER JOIN status_coffee ON product_coffee.id_status = status_coffee.id_status WHERE status_coffee.id_status=1";
$result_product_coffee_sale = mysqli_query($connect, $query_product_coffee_sale);
?>
<!DOCTYPE html>
<html>

<head>
    <title>หน้าขายของ</title>
    <?php include('header.html'); ?>
</head>

<body>
    <?php include('menu/menubar.php'); ?>

    <div class="container-fluid">

        <div class="row">
            <div class="col-6">

                <div class="container">

                    <table class="table" id="saleproduct">

                        <tr>
                            <th>ชื่อรายการ</th>
                            <th>จำนวน</th>
                            <th>ราคา</th>
                            <th>จัดการ</th>
                        </tr>
                        <tr>

                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-6">


                <div class="container">
                    <div class="row row-cols-2 row-cols-sm-2 row-cols-md-5">
                        <?php $i = 0;
                        while ($row = mysqli_fetch_array($result_product_coffee_sale)) {
                        ?>
                            <div class="col mt-4">
                                <img src="image/coffee (1).jpg" class="mb-1 responsive" alt="Girl in a jacket" width="112" height="100"><br>
                                <input type="radio" class="select_hot ms-2" idhot="<?php echo $row['hot_price']; ?>" hot="ร้อน">ร้อน<input type="radio" class="btn btn-success ms-5 select_ice" idice="<?php echo $row['ice_price']; ?>" ice="เย็น">เย็น</input>
                                <br>
                                <button style="width:100%"type="button" class="btn btn-info" name="<?php echo $row['coffee_product']; ?>" id="<?php echo $row['coffee_product']; ?>">เพิ่ม</button>
                            </div>

                        <?php } ?>

                    </div>








                </div>


            </div>
        </div>




    </div>











</body>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>



<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.colVis.min.js"></script>



<script type="text/javascript">
    $(document).ready(function() {
        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });


        $('#sidebar, #content').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');


        $('#sidebarCollapse').on('click', function() {
            $('#sidebar, #content').toggleClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="asset/sheet1.js"></script>

</html>