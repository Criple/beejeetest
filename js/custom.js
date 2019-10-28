(function($){
    $( document ).ready(function(){

        $('.statusCheck').click(function () {
            $taskId = $(this).val();
            $status = $(this).siblings('label')[0];
            if ($status.innerHTML == 'Активна'){
                $status.innerHTML = 'Не активна';
            }else if($status.innerHTML == 'Не активна'){
                $status.innerHTML = 'Активна';
            }
            $.ajax({
                type: "POST",
                url: "/home/statuschange",
                data: { taskID: $taskId }
            }).done(function( msg ) {
            });
        });

        $('.paginationLinks').click(function (event) {
            event.preventDefault();
            var form = $('#paginationForm');
            console.log($(this).data('page'));
            $('#paginationForm input[type="hidden"]').val($(this).data('page'));
            form.submit();
        });

    });
})(jQuery)