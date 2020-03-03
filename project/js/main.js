 $(window).on('load',function(){
        $('#myModal').modal('show');
        $('input[type="checkbox"]').each(function(){
                $(this).click(function (){
                    if ($(this).is(':checked')){

                 var  ajax =  $.ajax({
                            url: 'task_success.php',
                            type: 'POST',
                            async:false,
                            data: {
                                task_check: this.value,
                            },
                            success: function(data) {
                                console.log(data);
                                return data;
                            }
                            
                        });

                        $(this).parent().nextAll('#task_status').text('выполнено').addClass("task-item-status--completed");
                        

                      
                    
                }
                });
            }
        );
           
});