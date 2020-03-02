 $(window).on('load',function(){
        $('#myModal').modal('show');
        $('input[type="checkbox"]').each(function(){
                $(this).click(function (){
                    if ($(this).is(':checked')){
                    $.ajax({
                        url: 'task_success.php',
                        type: 'POST',
                        data: {
                            task_check: this.value,
                        },
                        success: function(data) {
                            console.log(data);
                            $('#task_status').text('работат');
                        }
                    });
                }
                });
            }
        );
           
});