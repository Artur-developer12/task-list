 $(window).on('load',function(){
        $('#myModal').modal('show');

        // Отправка статуса  через checkbox
        $('input[type="checkbox"]').each(function(){
                $(this).click(function (){
                    if ($(this).is(':checked')){

                          $.ajax({
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

                        $(this).parent().nextAll('.task-item-change-block').children('#task_status').text('выполнено').addClass("task-item-status--completed");
                   }
                });
            });



        // кнопка изменить
            $('.tast-item-link').each(function(){
                $(this).click(function(event){
                  event.preventDefault()
                    $(this).nextAll('#task-text-show').toggleClass('d-none');
                    $(this).nextAll('#task_text').toggleClass('d-none');

                });
            });



            // Изменение текста задачи 
            $('.task-item-submit').each(function() {
                $(this).click(function(event) {
                  event.preventDefault()

                    var task_id = $(this).siblings("#textarea_task").attr("data-name");
                    var task_text = $(this).siblings('#textarea_task').val();

                    $.ajax({
                            url: 'task_change.php',
                            type: 'POST',
                            data: {
                                task_text: task_text,
                                task_id: task_id,
                            },
                            success: function(data) {
                                location.reload();
                            }
                            
                    });
                });

                
            });


             // Сортировка
            // $('#sorting_btn').click(function(event) {
            //       event.preventDefault()

            //         var sort_column = $('#sort_column').val(); 
            //         var sort_line =  $('#sort_line').val();
            //         console.log(sort_column);
            //         console.log(sort_line);

            //         $.ajax({
            //                 url: 'sorting.php',
            //                 type: 'POST',
            //                 data: {
            //                     sort_column: sort_column,
            //                     sort_line: sort_line,
            //                 },
            //                 success: function(data) {
            //                     location.reload();
            //                 }
                            
            //         });
            // });


    
            
                 
            
});