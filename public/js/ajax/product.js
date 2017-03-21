
    var url = "/products";

    //display modal form for task editing
    $('#tasks-list').on("click", ".open-modal", function(){

        var row_id = $(this).val();

        $.get(url + '/' + row_id, function (data) {
            //success data
            // console.log(data);

            $('#row_id').val(data.id);
            $('#bereidingsduur').val(data.bereidingsduur);
            $('#naam').val(data.naam);
            $('#id').val(data.id);
            $('#status').val(data.status);
            $('#prijs').val(data.prijs);
            $('#beschrijving').val(data.beschrijving);

            $('#btn-save').val("update");

            $('#myModal').modal('show');
        })
    });

    //display modal form for creating new task
    $('#btn-add').click(function(){
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
                // console.log(data);

                $("#task" + row_id).remove();
            },
            error: function (data) {
                var errors = $.parseJSON(data.responseText);

                // console.log(errors);

                $.each(errors, function(index, value) {
                    $.gritter.add({
                        title: 'Error',
                        text: value
                    });
                });

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
            bereidingsduur: $('#bereidingsduur').val(),
            naam : $('#naam').val(),
            status : $('#status').val(),
            id : $('#id').val(),
            prijs : $('#prijs').val(),
            beschrijving : $('#beschrijving').val()
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

        // console.log(formData);

        $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                // console.log(data);

                var task = '<tr id="task' + data.id + '"><td>' + data.id + '</td><td>' + data.bereidingsduur + '</td><td>' + data.naam + '</td><td>' + data.prijs + '</td><td>' + data.status + '</td>';
                task += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.id + '" style="margin-right: 5px;">wijzigen</button>';
                task += '<button class="btn btn-danger btn-xs btn-delete delete-task" value="' + data.id + '">verwijderen</button></td></tr>';

                if (state == "add"){ //if user added a new record
                    $('#tasks-list').append(task);
                }else{ //if user updated an existing record

                    $("#task" + row_id).replaceWith( task );
                }

                $('#frmTasks').trigger("reset");

                $('#myModal').modal('hide')
            },
            error: function (data) {
                // console.log('Error:', data);
            }
        });
    });
// });
// </script>