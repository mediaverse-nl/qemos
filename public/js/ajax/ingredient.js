
    var url = "/admin/ingredient";

    var successMsg =  '<div class="alert alert-success">';
        successMsg += ' <strong>Gelukt!</strong> Het is opgeslagen.';
        successMsg += '</div>';

    function createAutoClosingAlert(selector, delay) {
        var alert = $(selector).alert();
        window.setTimeout(function() { alert.alert('close') }, delay);
    }

    //display modal form for task editing
    $('#tasks-list').on("click", ".open-modal", function(){
        // console.log('asda') ;
        $('div.has-error').removeClass('has-error');

        var row_id = $(this).val();

        console.log(row_id);

        $.get(url + '/' + row_id, function (data) {
            //success data
            // console.log(data);
            $('#row_id').val(data.id);
            $('#ingredient').val(data.ingredient);

            $('#btn-save').val("update");

            $('#myModal').modal('show');
        })
    });

    //display modal form for creating new task
    $('#btn-add').click(function(){
        $('div.has-error').removeClass('has-error');
        $('.error').html('');
        $('#btn-save').val("add");
        $('#frmTasks').trigger("reset");
        $('#myModal').modal('show');
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
                $("#successMsg").html( successMsg ); //appending to a <div id="form-errors"></div> inside form
                // console.log(successMsg);
                $("#task" + row_id).remove();

                createAutoClosingAlert('.alert', 1500);

            },
            error: function (data) {
                //show them somewhere in the markup
                //e.g

                // var errors = $.parseJSON(data.responseText);

                // console.log(errors);

                // console.log('Error:', data);
            }
        });
    });

    //create new task / update existing task
    $("#btn-save").on('click', function (e) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        e.preventDefault();

        var formData = {
            ingredient : $('#ingredient').val(),
            id : $('#id').val(),
        };

        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();

        var type = "POST"; //for creating new resource
        var row_id = $('#row_id').val();
        var my_url = url;

        if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url += '/' + row_id;
        }

        $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                // console.log(data);
                $("#successMsg").html( successMsg );

                var task = '<tr id="task' + data.id + '"><td>' + data.id + '</td><td>' + data.ingredient + '</td>';
                task += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.id + '" style="margin-right: 4px;">wijzigen</button>';
                task += '<button class="btn btn-danger btn-xs btn-delete delete-task" value="' + data.id + '">verwijderen</button></td></tr>';

                if (state == "add"){ //if user added a new record
                    $('#tasks-list').append(task);
                }else{ //if user updated an existing record
                    $("#task" + row_id).replaceWith( task );
                }
                // $('#frmTasks').trigger("reset");
                $('#myModal').modal('hide');

                createAutoClosingAlert('.alert', 1500);
            },
            error: function (data) {
                $('.error').html('');
                $('div.has-error').removeClass('has-error');
                $.each( data.responseJSON, function( key, value ) {
                    errorsHtml = '<li>' + value[0] + '</li>'; //showing only the first error.
                    inputErrorsHtml = '<small class="text-muted">' + errorsHtml + '</small>'; //showing only the first error.

                    $('div.error-' + key).addClass('has-error');
                    $('#error-' + key).html(inputErrorsHtml);
                    // console.log(inputErrorsHtml);
                });
                // console.log('Error:', data);
            }
        });
    });
// });
// </script>