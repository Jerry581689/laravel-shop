$(document).ready(function () {

    $(".buybutton").on("click", function () {
        let id = $(this).attr('value');
        $.ajax({
            type: 'post',
            url: 'addcart' ,
            data: {
                'id': id,
            },
            success: function (response) {
                swal("成功", "已加入購物車！", "success");
            },
            error: function (response) {
                alert("failed");
                console.log(response);
            },
        });
    });


    //新增商品
    $('#addproductModal').on('show.bs.modal', function (event) {
        //var button = $(event.relatedTarget) // Button that triggered the modal
        //var recipient = button.data('whatever') // Extract info from data-* attributes
        //var id = button.data('what');
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        //var modal = $(this)
        //modal.find('.modal-title').text('修改留言 ');
        //modal.find('.modal-body input').val(recipient);

        $('#checkaddproductbutton').on("click", function () {
            //$(this).removeData('#addproductModal');
            //('#addproductModal').dispose();
            $('#addproductModal').modal('dispose');
            let productname = $("#product-name").val();
            let productprice = $("#product-price").val();
            let productcontent = $("#product-content").val();
            let productpicture = $("#product-picture").val();

            console.log(productname + productprice + productcontent + productpicture);
            $.ajax({
                type: 'POST',
                url: 'addproduct',
                headers: { 'X-Requested-With': 'XMLHttpRequest' },
                data: {
                    'name': productname,
                    'price': productprice,
                    'content': productcontent,
                    'picture': productpicture,
                },
                success: function (response) {
                    $('#addproductModal').modal('hide');
                    $.each(response, function (key, val) {
                        //swal(val, "", "success");
                        alert(key+":"+val);
                    });
                    $(".show").each(function(){
                        let a = $(this)
                        a.remove();
                    });
                    window.location.reload();
                },
                error: function (response) {
                    console.log(response);
                }
            })
        })
    })
    //修改商品
    $('#editproductModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var price = button.data('whatever') // Extract info from data-* attributes
        var id = button.data('what');
        var name = button.data('name');
        var content = button.data('content');
        var modal = $(this)
        //modal.find('.modal-title').text('修改留言 ');
        modal.find('#edit-name').val(name);
        modal.find('#edit-price').val(price);
        modal.find('#edit-content').val(content);

        $('#CheckEditproductbutton').on("click", function () {
            let productprice = $("#edit-price").val();
            console.log(productprice)
            $.ajax({
                type: 'POST',
                url: 'editproduct',
                headers: { 'X-Requested-With': 'XMLHttpRequest' },
                data: {
                    'id': id,
                    'price': productprice,
                },
                success: function (response) {
                    $('#editproductModal').modal('hide');
                        $.each(response, function (key, val) {
                            //swal(val, "", "success");
                            alert(key + ":" + val);
                        });
                    $(".show").each(function () {
                        let a = $(this)
                        a.remove();
                    });
                    window.location.reload()
                },
                error: function (response) {
                    console.log(response);
                    }
            })
        })
    })
    //刪除商品
    $(document).on('click', '#deleteid', function () {
        let id = $(this).attr('data-id');
        $.ajax({
            type: 'POST',
            url: 'deleteproduct',
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            data: {
                'id': id,
            },
            success: function (response) {
                console.log(response);
                $.each(response, function (key, val) {
                    //swal(val, "", "success");
                    alert("成功");
                });
                window.location = "";
            },
            error: function (params) {
                console.log(params);
            }
        })
    });

    //修改個人資料
    $('.editpersonbtn').on("click", function () {
        let name = $("input[name='name']").val();
        let phone = $("input[name='phone']").val();
            $.ajax({
                type: 'POST',
                url: 'editperson',
                headers: { 'X-Requested-With': 'XMLHttpRequest' },
                data: {
                    'name': name,
                    'phone': phone,
                },
                success: function (response) {
                    $.each(response, function (key, val) {
                        //swal(val, "", "success");
                        alert(key + ":" + val);
                    });
                    window.location.href ='/shop/public/home'
                },
                error: function (response) {
                    console.log(response);
                }
            })
        })

})