
    var url = "/order";
    var tafel_id = $('#tafel').val();
    var bezet = $('#status').val();

    function OrderList() {
        var total = 0;
        $.ajax({
            type: "GET",
            url: url + '/' + tafel_id,
            success: function (data) {
                var html_order = '<ul class="list-group">';
                $.each(data, function(k, v) {
                    console.log(v);
                    html_order += '<li class="' + v.status + ' list-group-item"><span class="">' + v.product.naam + '</span>' +
                        '<span class="badge"> ' + v.product.prijs + ' </span>' +
                        '<span class="hidden id"> ' + v.id + ' </span>' +
                        '<span class="hidden product_id"> ' + v.product.id + ' </span>' +
                        '<span class="badge ">' + v.status + '</span></li>';
                    total += parseFloat(v.product.prijs)
                });
                html_order += '<li class="list-group-item"> totaal <span class="badge">€ ' + total + '</span></li>';
                html_order += '</ul>';
                $("#order").html(html_order);
                console.log(total);
            }
        });
    }
    setInterval(OrderList, 5000);
    OrderList();

    $("#option").on('click', '#btn-save', function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        e.preventDefault();

        var formData = {
            tafel_id : $('#tafel').val(),
        };

        $.ajax({
            type: "POST",
            url: url + '/save',
            data: formData,
            dataType: 'json',
            success: function (data) {
                OrderList();
                console.log(data);
            }
        });
    });

    $("#order").on('click', '.open', function (e) {
        var orderedItem = $(this).find('.id').text();
        var productId = parseInt($(this).find('.product_id').text());
        // console.log(productId);

        $.ajax({
            type: "GET",
            url: url + '/product/' + productId,
            success: function (data) {
                console.log(data);
                $('.modal').modal('show');

                var html_order = '<ul class="list-group">';
                $.each(data, function(k, v) {
                    html_order += '<p>' + v.ingredient.ingredient + '</p>';

                    console.log(v);
                //     html_order += '<li class="' + v.status + ' list-group-item"><span class="">' + v.product.naam + '</span>' +
                //         '<span class="badge"> ' + v.product.prijs + ' </span>' +
                //         '<span class="hidden id"> ' + v.id + ' </span>' +
                //         '<span class="hidden product_id"> ' + v.id + ' </span>' +
                //         '<span class="badge ">' + v.status + '</span></li>';
                //     total += parseFloat(v.product.prijs)
                });

                html_order += '</ul>';

                $(".modal-body").html(html_order);

            }
        });
        // $('#myModal').on('submit', function(e) {

            // $('modal').modal('toggle');
            // $('modal').modal('hide');

            // e.preventDefault();
        // });

        // console.log(orderedItem);
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        //     }
        // });
        //
        // e.preventDefault();
        //
        // var formData = {
        //     tafel_id : $('#tafel').val(),
        // };
        //
        // $.ajax({
        //     type: "POST",
        //     url: url + '/save',
        //     data: formData,
        //     dataType: 'json',
        //     success: function (data) {
        //         OrderList();
        //         console.log(data);
        //     }
        // });
    });


    $("#menu").on('click', '#btn-menu', function () {
        $(".menu").hide();
        $(".btn-menu").removeClass('active');
        $(".menu-item-" + $(this).val()).addClass('active');
        $(".menu-" + $(this).val()).show();
    });

    //delete task and remove it from list
    $('#tasks-list').on('click', '.delete-task',function(){
        var row_id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url: url + '/' + row_id,
            success: function (data) {
                $("#task" + row_id).remove();
            }
        });
    });

    //create new task / update existing task
    $("#product").on('click', '#btn-add', function (e) {
        var product_id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        e.preventDefault();

        var formData = {
            product_id : product_id,
            tafel_id : tafel_id,
            status : bezet,
            // id : $(this).val(),
            // id : $('#id').val(),
        };

        // console.log(formData);
        //used to determine the http verb to use [add=POST], [update=PUT]
        // var product_id = $('#btn-add').val();

        // var row_id = $('#row_id').val();

        $.ajax({
            type: "POST",
            url: url + '/add',
            data: formData,
            dataType: 'json',
            success: function (data) {
                OrderList();
                console.log(data);

                // var task = '<tr id="task' + data.id + '"><td>' + data.id + '</td><td>' + data.naam + '</td>';
                // task += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.id + '" style="margin-right: 4px;">wijzigen</button>';
                // task += '<button class="btn btn-danger btn-xs btn-delete delete-task" value="' + data.id + '">verwijderen</button></td></tr>';

                // $("#order").replaceWith('<div id="order">' + data.product_id + '</div>');
            }
        });
    });
// });
// </script>