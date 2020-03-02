 $(window).on('load',function(){
        $('#myModal').modal('show');

       $('#checkbox_task').click(function() {
        if ($('#checkbox_task').is(':checked')){
         var task_check = $(this).val();
         alert(task_check);

            $.ajax({
                type: 'POST',
                url: 'task_success.php',
                data:{'task_check':task_check},
                dataType: "html",
                cashe: false,
                contentType: false,
                success: function (data) {
                    
                }
            });
        };




       });
       

    });