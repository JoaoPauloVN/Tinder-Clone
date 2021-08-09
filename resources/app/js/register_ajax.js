
$('.modal_register_btn').click(function(e) {
    e.preventDefault();
    let form = $('.register_form');
    let name = form.children('[name=name]').val();
    let email = form.children('[name=email]').val();
    let password = form.children('[name=password]').val();
    let url = form.children('[name=url]').val();
    let _token = $('input[name=_token]').val();
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        type: 'post',
        dataType: 'json',
        url: url + '/auth/register_user',
        data: {
          'name': name,
          'email': email,
          'password': password,
          'sex': 'M'
        },
        success: function(data) {
            console.log(data);
            $('.register_form')[0].reset();
            $(`.register_form .error`).html('');
            $('.modal_register').css('display', 'none');
            enableScroll();
            function enableScroll() {
              window.onscroll = function() {};
            }
            $('.enter').click();

        },
        error: function(data) {
          if(data.responseJSON.errors != null) {
            $(`.register_form .error`).html('');
            $.each(data.responseJSON.errors, function(q,e) {
                $(`.register_form .${q}`).html(e[0]);
            });
          }
          
        }
    });
    return false;
})
