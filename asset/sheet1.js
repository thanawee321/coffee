


$(document).ready(function () {


    var i = 1;
    $('#add').click(function () {
        i++;
        $('#dynamic_insert_coffee').append('<tr id="row' + i + '"><td><input type="text" class="form-control" name="name_coffee[]" id="name_coffee[]"></td><td><input type="number" class="form-control" name="hot_price[]" id="hot_price[]"></td><td><input type="number" class="form-control" name="ice_price[]" id="ice_price[]"></td><td><button style="width:100%" class="btn btn-danger btn_remove" name="remove" id="' + i + '"><i class="fas fa-times"></i></button></td></tr>')
        $('.btn_remove').click(function () {

            var button_id = $(this).attr('id');
            $("#row" + button_id + "").remove();

        });

    });


    $('#add2').click(function () {

        console.log('TEST');
        i++;
        $('#dynamic_insert_food').append('<tr id="row' + i + '"><td><input type="text" class="form-control" name="name_food[]" id="name_food[]"></td><td><input type="number" class="form-control" name="price_food[]" id="price_food[]"></td><td><button type="button" style="width:100%" class="btn btn-danger btn_remove2" name="remove2" id="' + i + '"><i class="fas fa-times"></i></button></td></tr>');
        $('.btn_remove2').click(function () {

            var button_id2 = $(this).attr('id');
            $('#row' + button_id2 + "").remove();

        });

    });


    $('.update_coffee_product').click(function () {

        $tr = $(this).closest("tr");
        var data = $tr.children("td").map(function () {

            return $(this).text();

        }).get();

        console.log(data);
        $('#id_product_update').val(data[1]);
        $('#name_coffee_update').val(data[2]);
        $('#hot_price_update').val(data[3]);
        $('#ice_price_update').val(data[4]);


        $('#edit_coffee_product').modal('show');




    });


    $('.update_food_product').click(function () {

        $tr = $(this).closest("tr");
        var data = $tr.children("td").map(function () {

            return $(this).text();

        }).get();

        console.log(data);
        $('#id_product_food').val(data[1]);
        $('#name_food').val(data[2]);
        $('#food_price').val(data[3]);



        $('#edit_food_product').modal('show');




    });







    $('.status').click(function () {

        var product = $(this).attr('id2');
        var status = $(this).attr('id');
        var name = $(this).attr('name');
        //console.log(product);
        //console.log(status);
        //console.log(name);

        if (status == 1) {

            $('#product_id').val(product);
            $('#status_product').val(status);
            $('#name_product').val(name);

        } else if (status == 2) {

            $('#product_id').val(product);
            $('#status_product').val(status);
            $('#name_product').val(name);
        }

    });

    $('.status_food').click(function () {

        var id_food = $(this).attr('id_food');
        var status = $(this).attr('id');

        console.log(id_food);
        console.log(status);

        if (status == 1) {

            $('#id_food').val(id_food);
            $('#status_product_food').val(status);


        } else if (status == 2) {

            $('#id_food').val(id_food);
            $('#status_product_food').val(status);

        }


    });



    $('.status_mat_coffee').click(function () {


        var id_coffee = $(this).attr('id_coffee');
        var status_mat_coffee = $(this).attr('id');
        var name_mat_coffee = $(this).attr('name');

        console.log(id_coffee);
        console.log(status_mat_coffee);

        if(status_mat_coffee == 1){
            $('#id_mat_coffee').val(id_coffee);
            $('#status_material_coffee1').val(status_mat_coffee);
            $('#name_mat_coffee1').val(name_mat_coffee);
        }
        else if (status_mat_coffee == 2){

            $('#id_mat_coffee').val(id_coffee);
            $('#status_material_coffee1').val(status_mat_coffee);
            $('#name_mat_coffee1').val(name_mat_coffee);
           

        }




    });


    $('.delete_coffee_product').click(function () {

        var id_product = $(this).attr('id');
        var name_product = $(this).attr('id_name');

        console.log(id_product);
        $('.cfdelete_coffee_product').click(function () {

            $.ajax({

                url: "querydata/delete_coffee_product.php",
                type: "GET",
                data: { id_product: id_product, name_product: name_product },
                success: function (data) {

                    //alert('ลบข้อมูลสำเร็จ');
                    window.location.reload();

                }

            })

        });

    });



    $('.delete_food_product').click(function () {

        var id_food = $(this).attr('id');
        var name_food = $(this).attr('name_food');

        //console.log("ID : " + id_food + "\n" + "name : " + name_food);

        $('.cfdelete_food_product').click(function () {

            $.ajax({

                url: "querydata/delete_food_product.php",
                type: "GET",
                data: { id_food: id_food, name_food: name_food },
                success: function (data) {

                    //alert('ลบข้อมูลสำเร็จ');
                    window.location.reload();
                }

            });


        })

    });

    $('.delete_material_coffee_product').click(function () {


        var id_mat_coffee = $(this).attr('id');
        var name_mat_coffee = $(this).attr('name');
        console.log(id_mat_coffee);

        $('.cfdelete_material_coffee_product').click(function () {

            $.ajax({

                url: "querydata/delete_coffee_material.php",
                type: "GET",
                data: { id_mat_coffee: id_mat_coffee ,name_mat_coffee: name_mat_coffee},
                success: function (data) {

                    window.location.reload();

                }


            });
        });


    });





    $('#have_mat_coffee').change(function () {

        var have = $(this).val();
        //console.log(have + "\n");

        $('#use_mat_coffee').change(function () {
            var use = $(this).val();
            var total = have - use;
            //console.log(total);


            $('#total_mat_coffee').val(total);

        });
    });

    $('.edit_material_coffee').click(function () {

        $tr = $(this).closest("tr");
        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();

        console.log(data);
        $('#id_mat').val(data[1]);
        $('#edit_name_mat_coffee').val(data[2]);
        $('#edit_have_mat_coffee').val(data[3]);
        $('#edit_use_mat_coffee').val(data[4]);
        $('#edit_total_mat_coffee').val(data[5]);
        $('#edit_unit_mat_coffee').val(data[6]);

        $('#edit_material_coffee_product').modal('show');

    });





    $('#have_mat_food').change(function () {

        var have = $(this).val();
        console.log(have);

        $('#use_mat_food').change(function () {
            var use = $(this).val();
            var total = have - use;
            console.log(total);


            $('#total_mat_food').val(total);

        });
    });

    $('#edit_have_mat_coffee').change(function () {

        var have = $(this).val();
        console.log(have);

        $('#edit_use_mat_coffee').change(function () {
            var use = $(this).val();
            var total = have - use;
            console.log(total);


            $('#edit_total_mat_coffee').val(total);

        });
    });







    ///////////////////////////////////////////////////////////////////////////////////

    $('#viewCoffeeProduct').DataTable({

        lengthMenu: [[5, 7, 10, 15, -1], ["5", "7", "10", "15", "ทั้งหมด"]],
        pageLength: 5,
        language: {
            lengthMenu: "แสดง _MENU_ ",
            info: " _START_ ถึง _END_ จาก _TOTAL_ ",
            sSearch: "ค้นหา :",

        },

    });





    $('#viewProductFood').DataTable({

        lengthMenu: [[5, 7, 10, 15, -1], ["5", "7", "10", "15", "ทั้งหมด"]],
        pageLength: 5,
        language: {
            lengthMenu: "แสดง _MENU_ ",
            info: " _START_ ถึง _END_ จาก _TOTAL_ ",
            sSearch: "ค้นหา :",

        },

    });


    $('#viewMaterialcoffee').DataTable({

        lengthMenu: [[5, 7, 10, 15, -1], ["5", "7", "10", "15", "ทั้งหมด"]],
        pageLength: 5,
        language: {
            lengthMenu: "แสดง _MENU_ ",
            info: " _START_ ถึง _END_ จาก _TOTAL_ ",
            sSearch: "ค้นหา :",

        },


    });


    $('#viewMaterialfood').DataTable({

        lengthMenu: [[5, 7, 10, 15, -1], ["5", "7", "10", "15", "ทั้งหมด"]],
        pageLength: 5,
        language: {
            lengthMenu: "แสดง _MENU_ ",
            info: " _START_ ถึง _END_ จาก _TOTAL_ ",
            sSearch: "ค้นหา :",

        },


    });






    $('#viewdatacoffee').dataTable({

        dom: "Bfrtip",
        lengthMenu: [
            [5, 10, 25, 50, -1],
            ["5 rows", "10 rows", "25 rows", "50 rows", "ทั้งหมด"],
        ],
        pageLength: 7,
        language: {
            info: "แสดงตั้งแต่ _START_ ถึง _END_ จากทั้งหมด _TOTAL_ ที่มีอยู่",
            sSearch: "ค้นหา :",
        },

        buttons: [
            {
                extend: "pageLength",
                text: "แสดงข้อมูล  ⠀⠀",
            },
            {
                extend: "colvis",
                text: "ซ่อนคอลลั่ม  ⠀⠀",
            },
            {
                extend: "csv",
                text: '<i class="fas fa-file-csv"></i> CSV File',
                filename: "รายชื่อเมนูกาแฟ",
                charset: "UTF-8",
                bom: "true",
                init: function (api, node, config) {
                    $(node).removeClass("btn-success");
                },
            },
            {
                extend: "excel",
                text: '<i class="fas fa-file-excel"></i> Excel File',
                filename: "รายชื่อเมนูกาแฟ",
                charset: "UTF-8",
                bom: "true",
                init: function (api, node, config) {
                    $(node).removeClass("btn-success");
                }
            }

        ],



    });

    $('#viewFood').DataTable({

        dom: 'Bfrtip',
        lengthMenu: [[5, 10, 25, 50, -1], ['5 rows', '10 rows', '25 rows', '50 rows', 'ทั้งหมด']],
        pageLength: 7,
        language: {

            info: "แสดงตั้งแต่ _START_ ถึง _END_ จากทั้งหมด _TOTAL_ ที่มีอยู่",
            sSearch: "ค้นหา : ",
        },
        buttons: [

            {

                extend: "pageLength",
                text: "แสดงข้อมูล  ⠀⠀",
            },
            {

                extend: "colvis",
                text: "ซ่อนคอลลั่ม  ⠀⠀"

            },
            {
                extend: "csv",
                text: '<i class="fas fa-file-csv"></i> CSV File',
                filename: "รายชื่อเมนูอาหาร",
                charset: "UTF-8",
                bom: "true",
                init: function (api, node, config) {
                    $(node).removeClass("btn-success");
                },
            },
            {
                extend: "excel",
                text: '<i class="fas fa-file-excel"></i> Excel File',
                filename: "รายชื่อเมนูอาหาร",
                charset: "UTF-8",
                bom: "true",
                init: function (api, node, config) {
                    $(node).removeClass("btn-success");
                }
            }


        ]


    });


    $('#viewmaterialCoffee').DataTable({
        dom: 'Bfrtip',
        lengthMenu: [[5, 10, 25, 50, -1], ['5 rows', '10 rows', '25 rows', '50 rows', 'ทั้งหมด']],
        pageLength: 7,
        language: {

            info: "แสดงตั้งแต่ _START_ ถึง _END_ จากทั้งหมด _TOTAL_ ที่มีอยู่",
            sSearch: "ค้นหา : ",
        },
        buttons: [

            {

                extend: "pageLength",
                text: "แสดงข้อมูล  ⠀⠀",
            },
            {

                extend: "colvis",
                text: "ซ่อนคอลลั่ม  ⠀⠀"

            },
            {
                extend: "csv",
                text: '<i class="fas fa-file-csv"></i> CSV File',
                filename: "รายชื่อวัตถุดิบกาแฟ",
                charset: "UTF-8",
                bom: "true",
                init: function (api, node, config) {
                    $(node).removeClass("btn-success");
                },
            },
            {
                extend: "excel",
                text: '<i class="fas fa-file-excel"></i> Excel File',
                filename: "รายชื่อวัตถุดิบกาแฟ",
                charset: "UTF-8",
                bom: "true",
                init: function (api, node, config) {
                    $(node).removeClass("btn-success");
                }
            }


        ]
    });







});




function showpass() {

    var pass = document.getElementById('password');

    if (pass.type === "password") {

        pass.type = "text";
    } else {
        pass.type = "password";
    }

}

