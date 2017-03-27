
    var url = "/order";
    var tafel_id = $('#tafel').val();
    var bezet = $('#status').val();

    function refresh() {
        $.ajax({
            type: "GET",
            url: url + '/' + tafel_id,
            success: function (data) {
                var html_order = '<ul>';
                $.each(data, function(k, v) {
                    // console.log(v);
                    // $('#menu').val(v);
                    html_order += '<li><span class="pull-left">' + v.product.naam + '</span><span class="pull-right">' + v.product.prijs + '</span></li>';
                });
                html_order += '</ul>';

                $("#order").replaceWith('<div id="order">' + html_order + '</div>');
                // console.log(data);
                // $("#order" + row_id).replaceWith( task );
            }
        });

    }
    setInterval(refresh, 5000);
    refresh();

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
                refresh();
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