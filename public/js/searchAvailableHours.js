$(function()
{
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

    $('#form-hours').submit(function(e){
        
        var route = $('#form-hours').data('route')
        var form_data = $(this);
    
        // var form_data = $('#search').val();
        
        // alert(route);

        $('.change').remove();

        $.ajax({
            type: 'POST',
            url: route,
            data: form_data.serialize(),
            // data: form_data,
            success: function(response)
            {
                // console.log(Response);

                if (response.search) {
                    alert(response);
                    // $('#alerts').append('<p class="change text-success">'+response.search+'</p>');
                }

                if (response.success) {
                    alert(response);
                    $('#alerts').append('<p class="change text-success">'+response.success+'</p>');
                }
                
            }
        });

        e.preventDefault();


    });
});