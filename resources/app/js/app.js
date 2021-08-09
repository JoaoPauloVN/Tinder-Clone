$('.enter').click(function(e){
    e.preventDefault();
    $('.modal_login').css('display','flex');
    $('.error').html('');
    disableScroll();
})

$('.register').click(function(e){
    e.preventDefault();
    $('.modal_register').css('display','flex');
    $('.error').html('');
    disableScroll();
})

$('.modal_register').click(function(){
    $(this).css('display','none');
    enableScroll();
})

$('.modal_login').click(function(){
    $(this).css('display','none');
    enableScroll();
})

$('.box_modal').click(function(e){
    e.stopPropagation();
    enableScroll();
})

$('.menu_btn').click(function() {
    $('.menu_mobile_box').animate({
        left: '0%'
    },200);
    disableScroll();
})

$('.close_menu').click(function(){
    $('.menu_mobile_box').animate({
        left: '110%'
    },200);
    enableScroll();
})

$('.box_modal .close').click(function(){
    $('.modal_register').css('display','none');
    $('.modal_login').css('display','none');
    
})

$('.modal_login_btn').click(function(){
    $('.modal_register').css('display','none');
    $('.enter').click();
    disableScroll();
})

$('.modal_register_link').click(function(){
    $('.modal_login').css('display','none');
    $('.register').click();
    disableScroll();
})

$('.drop_menu_link').mouseenter(function(){
    $('.drop_menu').css('display','block');
})

$('.drop_menu').mouseenter(function(e){
    e.stopPropagation();
    $('.drop_menu').css('display','block');
})

$('.drop_menu').mouseleave(function(e){
    $('.drop_menu').css('display','none');
})

$('.drop_menu_link').mouseleave(function(){
    $('.drop_menu').css('display','none');
})

$('.drop_menu_link_mobile').click(function(){
    let el = $(this);
    if($(this).hasClass('active')) {
        el.removeClass('active');
        $('.fa-chevron-down').animate(
        { deg: 360 },
        {
            duration: 750,
            step: function(now) {
            $(this).css({ transform: 'rotate(' + now + 'deg)',top: '15px', color: 'rgb(216, 216, 216)'});
            }
        }
        );
        $('.drop_menu_mobile').css('display','none');
    } else {
        el.addClass('active');
        $('.fa-chevron-down').animate(
        { deg: 180 },
        {
            duration: 750,
            step: function(now) {
            $(this).css({ transform: 'rotate(' + now + 'deg)',top: '14px', color: '#FD546C' });
            }
        }
        );
        $('.drop_menu_mobile').css('display','block');
    }

});



function disableScroll() {
    // Get the current page scroll position
    scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    scrollLeft = window.pageXOffset || document.documentElement.scrollLeft,
  
        // if any scroll is attempted, set this to the previous value
        window.onscroll = function() {
            window.scrollTo(scrollLeft, scrollTop);
        };
}
  
function enableScroll() {
    window.onscroll = function() {};
}

$(window).scroll(function () {
    if($( ".main" ).width() > 896){
        let height = $( ".main" ).height() - 85;
        if ($(window).scrollTop() > height) {
            $('.nav').css('position', 'absolute').css('top', 'calc(100% - 85px)').css('padding-bottom','20px');
        } else {
            $('.nav').css('position', 'fixed').css('top', '0').css('padding-bottom','90px');
            $('.text').css('opacity', '1');
            if($(window).scrollTop() > 50 && $(window).scrollTop() < 400) {
                let opacity = 1 - ($(window).scrollTop() / 400);
                $('.text').css('opacity', opacity);
            } else if ($(window).scrollTop() > 370)
                $('.text').css('opacity', '0');
        }
    } else {
        $('.nav').css('position', 'static');
        $('.text').css('opacity', '1');
    }
    
});

$( window ).resize(function() {
    if($( ".main" ).width() < 896){
        $('.nav').css('position', 'static');
        $('.text').css('opacity', '1');
    };
    
});

// App Page

$('.matches_btn').click(function() {
    $(this).css('border-bottom', '3.5px solid #FD546C');
    $(this).addClass('actived');
    $('.messages_btn').removeClass('actived');
    $('.messages_btn').css('border-bottom', 'none');
    
    $('.matches').animate({
        right: '0'
    }, 300);
    $('.messages').animate({
        right: '-2%'
    }, 300);

    $('.matches div').children('.icon').children('svg').first().addClass('first_card');
    $('.messages').find('#svg_23').removeClass('chat_1');
    $('.messages').find('#svg_33').removeClass('chat_2');
    if($('.box_chat_single').hasClass('actived')) {
        $('.box_chat_single').click();
    }
})

$('.messages_btn').click(function() {
    $(this).css('border-bottom', '3.5px solid #FD546C');
    $(this).addClass('actived');
    $('.matches_btn').removeClass('actived');
    $('.matches_btn').css('border-bottom', 'none');
    $('.matches').animate({
        right: '52%'
    }, 300);
    $('.messages').animate({
        right: '50%'
    }, 300);
    $('.first_card').removeClass('first_card');
    setTimeout(function() {
        $('.messages').find('#svg_23').addClass('chat_1');
        setTimeout(function() {
            $('.messages').find('#svg_33').addClass('chat_2');
        }, 1000);
    }, 300)
})

$('.title .img, .title > i').click(function() {
    if(!$('.title .img').hasClass('actived')) {
        $('.title .img').addClass('actived');
        $('.title > i').css('display', 'block');
        if($('.messages_btn').hasClass('actived')) {
            $('.matches').animate({
                right: '100%'
            });
        }

        $('.settings').animate({
            left: '0'
        });
        $('.chat').animate({
            left: '400'
        })
        $('.settings_user').css('display', 'block');
        $('.main_user').css('display', 'none');
    } else {
        $('.title .img').removeClass('actived');
        $('.title > i').css('display', 'none');
        $('.matches').css('left: 0;');
        if($('.messages_btn').hasClass('actived')) {
            $('.matches').animate({
                right: '50%'
            });
        };
        $('.settings').animate({
            left: '-375'
        });
        $('.chat').animate({
            left: '20'
        })
        $('.settings_user').css('display', 'none');
        $('.main_user').css('display', 'block');
        
    }
})

$('.circle.like').click(function(){
    let id_from = $('#id_from').html();
    let id_to = $('#id_to').html();
    sendAjax(id_to, id_from, '1');
})

function sendAjax(id_to,id_from, action){
    let url = $('#url_action').html();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'post',
        url: url,
        data: {'id_from': id_from, 'id_to': id_to, 'action' : action},
        dataType: 'json'
    }).done(function(data){
        if(data.success){
            window.location.reload();
        }
    })
}

$('.circle.deslike').click(function(){
    let id_from = $('#id_from').html();
    let id_to = $('#id_to').html();
    sendAjax(id_to, id_from,'0');
})

// Chat System

$('.box_chat_single').click(function(){
    let id = $(this).attr('id');
    let box_chat = $(this);
    let chat = $('.main .chat');
    let cards = $('.main .cards');

    if(!box_chat.hasClass('actived')) {
        $('.box_chat_single').removeClass('actived');
        box_chat.addClass('actived');
        chat.css('display', 'flex');
        cards.css('display', 'none');
        let id_user = parseInt($('#id_from').html());
        let url = $('.box_chat').find('.chat_url').html();
        $.ajax({
            type: 'post',
            url: url,
            data: {'id_user': id_user, 'id_chat': id, 'limit':'25'},
            dataType: 'json'
        }).done(function(data){
            $('.box_chat').find('.user_info').html(`
                <div>
                    <div class='chat_btn'><i class="fas fa-chevron-left"></i></div>
                    <div class="img">
                        <img src="http://127.0.0.1:8000/assets/app/images/${data.user.image}" alt="">
                    </div>
                    <h2>${data.user.name}</h2>
                </div>
                <div class='user_info_btn'>
                    <i class="fas fa-ellipsis-v"></i>
                </div>
            `);
            $('.chat .box_user .user_info').html(`
                <div class="img">
                    <img src="http://127.0.0.1:8000/assets/app/images/${data.user.image}" alt="">
                </div>
                <div class="info">
                    <h2><span>${data.user.name}</span></h2>
                    <p><i class="fas fa-map-marker-alt"></i> a <span>60</span> quilômetros daqui</p>
                    <p hidden class='user_id'>${data.user.id}</p>
                </div> 
            `);
            $('.chat_btn').on('click',function(){
                $('.box_chat_single').click();
            })

            $('.user_info .user_info_btn').on('click',function(){
                $('.box_user').animate({
                    right: 0,
                })
            })
        });
        getMessage(id);
        
    } else {
        box_chat.removeClass('actived');
        chat.css('display', 'none');
        cards.css('display', 'block');
    }
    
})
    
$('.unmatch').click(function(){
    let id = parseInt($('.box_user .user_info .user_id').html());
    let id_user = parseInt($('#id_from').html());
    $.ajax({
        type: 'post',
        url: $(this).attr('url'),
        data: {'id_from': id_user, 'id_to': id, 'action':'unmatch'},
        dataType: 'json'
    }).done(function(data){
        console.log(data);
        if(data.success)
        window.location.reload();
    })
})

    
$('.sendMessage').click(function(){
    if($("#message").val().length > 0) {
        let id_chat = $('.box_chat_single.actived').attr('id');
        let id_user = parseInt($('#id_from').html());
        let message = $('#message').val();
        let url = $("#sendMessage").html();
        if(message != '') {
            $.ajax({
                type: 'post',
                url: url,
                data: {'id_chat': id_chat, 'id_user': id_user, 'message':message},
                dataType: 'json'
            }).done(function(data){
                if(data.success) {
                    let box_chat = $('.box_messages');
                    $('#message').val('');
                    box_chat.append(`
                        <div class="box_message_single me">
                            <p>${message}</p>
                        </div>
                    `);
                    $('.box_messages').scrollTop($('.box_messages')[0].scrollHeight);
                    $('button.sendMessage').css('background','#d5d5d5').css('cursor', 'default');
                }
            })
        }
    } else {
        $(this).css('cursor', 'default')
    }
})

$("#message").keyup(function(event) {
    if (event.keyCode === 13) {
        $(".sendMessage").click();
    }
});

$('#message').keyup(function(){
    var button = $('button.sendMessage');
    if($(this).val().length > 0) {
        button.css('background','gray').css('cursor', 'pointer');
    } else {
        button.css('background','#d5d5d5').css('cursor', 'default');
    }
});

$('#message').blur(function(){
    if($(this).val().length === 0) {
        $('button.sendMessage').css('background','#d5d5d5');
    }
});

function getMessage(id) {
    let id_user = parseInt($('#id_from').html());
    let url = $('.box_chat').find('.chat_url').html();
    $.ajax({
        type: 'post',
        url: url,
        data: {'id_user': id_user, 'id_chat': id, 'limit':'25'},
        dataType: 'json'
    }).done(function(data){
        if(data.messages) {
            let chat = data.messages.reverse();
            let box_chat = $('.box_messages');
            box_chat.html('');
            for(let i = 0; i < chat.length; i++) {
                let messages = chat[i];
                let owner = '';
                if(messages.id_user == id_user) 
                    owner = 'me';
                box_chat.append(`
                    <div class="box_message_single ${owner} ${status}">
                        <p>${messages.message}</p>
                    </div>    
                `);
            }
        }
    });
}

setInterval(function(){
    if($('.box_chat_single').hasClass('actived')){
        let id = $('.box_chat_single.actived').attr('id');
        getMessage(id);
    }
}, 1000);


// Settings app 

$('.settings button span').click(function(){
    let button = $(this).closest('button');
    let field = button.attr('class');
    let content = $(this).html().split('<i class="fas fa-chevron-right"></i>')[0].trim();
    let icon = '<i class="fas fa-chevron-right"></i>';
    let id = $('#id_from').html();
    let url = $('#url_action').html();
    if(!$(this).hasClass('actived')) {
        $(this).addClass('actived');
        $(this).html('');
        let span = $(this);
        if(field == 'email' || field == 'phone') {
            $(this).append(`<input type='text' placeholder='${content}'> ${icon}`);
            $('button.phone input').mask('(00) 00000-0000');
            $(this).find('input').focus();
            $(this).find('input').focusout(function(){
                let contentInput = $(this).val();
                span.removeClass('actived');
                if(contentInput == '') {
                    span.html('');
                    span.append(`${content} ${icon}`);
                } else {
                    updateSettings(url, contentInput, content, field, id, span, icon);
                }
                
            });
        } else if(field == 'sex' || field == 'sexual_affinity') {
            let H = '';
            let M = '';
            if(content == 'Mulher')
                M = 'selected';
            if(content == 'Homem') 
                H = 'selected';
            $(this).append(`  
            <select name="sex" class='sex'>
                <option value="Homem" ${H}>Homem</option>
                <option value="Mulher" ${M}>Mulher</option>
            </select> ${icon}
            `);
            $(this).find('i').animate(
                { deg: 90 },
                {
                    duration: 300,
                    step: function(now) {
                    $(this).css({ transform: 'rotate(' + now + 'deg)',top: '15px', color: '#FD546C'});
                    }
                }
            );
            $(this).find('select').focusout(function(){
                
                let select_val = $(this).val();
                span.removeClass('actived');
                if(select_val == content) {
                    span.html('');
                    span.append(`${content} ${icon}`);
                } else {
                    let id = $('#id_from').html();
                    updateSettings(url, select_val, content, field, id, span, icon);
                    getUsers(id);
                }
            });
        }
        
    }
}) 

$('button.visible .button').click(function(){
    let el = $(this);
    let id = $('#id_from').html();
    let url = $('#url_action').html();
    if(!$(this).hasClass('actived')) {
        el.find('p').animate({
            left: '26'
        }, 200);
        el.find('p').css('background', '#FD546C');
        el.addClass('actived');
        updateSettings(url, '1', '0', 'visible', id);
        $('.box_card .users').css('display', 'block');
        $('.not_found').remove();
        getUsers(id);
    } else {
        el.find('p').animate({
            left: '0'
        }, 200);
        el.find('p').css('background', 'rgb(194, 194, 194)');
        el.removeClass('actived');
        updateSettings(url, '0', '1', 'visible', id);
        $('.main_user .box_card ').css('display', 'none');
        $('.cards').append(`<h2 class='not_found'>Abilite para que outras pessoas possam te ver primeiro!</h2>`);
    }
})

$('.settings_user .card_content').on('click',function(){
    $('#input_file').trigger('click');
})


$('#input_file').on('change', function(e){
    let file = $(this)[0].files[0];
    if(file){
        $('form input[type=submit]').click();
    }
})

$('.icons form').on('submit', function(ev) {
    ev.preventDefault(); // Prevent browser default submit.
    let url = $('#url_action').html() + '/image';
    var formData = new FormData(this);
    $.ajax({
        url: url,
        type: "POST",
        data: formData,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false
    }).done(function(data) {
        if(data.success) {
            let image = data.name;
            $('.title').find('.img').html(`<img src="http://localhost/Tinder-Clone/public/assets/app/images/${image}" alt="user_image"></img>`);
            $('.settings_user .card_content').css('background', "rgba(0,0,0,0.1) url('http://localhost/Tinder-Clone/public/assets/app/images/"+image+"')");
        } else {
            alert(data.message);
        }

        
    });
})

function updateSettings(url, contentInput, content, field, id, span = '', icon = '') {
    $.ajax({
        type: 'post',
        url:   url+'/settings',
        data: {'newContent': contentInput, 'oldContent': content, 'field': field, 'user_id': id},
        dataType: 'json'
    }).done(function(data){
        if(data.success) {
            if(span != '') {
                span.html('');
                span.append(`${contentInput} ${icon}`);
                if(contentInput == 'Homem' || contentInput == 'Mulher') {
                    userCard(data.user)
                }
            }
        } else {
            alert(data.message);
            if(span != '') {
                span.html('');
                span.append(`${data.content} ${icon}`);
            }
        }
    });
}

function getUsers(id) {
    let url = $('#url_action').html();
    $.ajax({
        url: url+'/visible',
        type: 'post',
        data: {'id': id},
        dataType: 'json'
    }).done(function(data){  
        userCard(data);   
    })
}

function userCard(data) {
    let box = $('.main .cards');
    if(data){
        box.html(`
        <div class="box_card">
            <div class="card_content" style="background: rgba(0,0,0,0.1) url('http://localhost/Tinder-Clone/public/assets/app/images/${data.image}')">
                <div>
                    <h2>${data.name} <span>${data.age}</span><p hidden id='id_to'>${data.id}</p></h2>
                    <p><i class="fas fa-map-marker-alt"></i> a <span class='location'></span> quilômetros daqui</p>
                </div>            
            </div>
            <div class="icons">
                <div class="circle deslike">
                    <i class="fas fa-times"></i>
                </div>
                <div class="circle favorite">
                    <i class="fas fa-star"></i>
                </div>
                <div class="circle like">
                    <i class="fas fa-heart"></i>
                </div>
            </div>
        </div>
        `);
    } else {
        box.html("<h2 class='not_found'>Não há pessoas disponiveis!</h2>");
    } 
}

$('.menu_btn_mobile').click(function(e){
    e.stopPropagation();
    if(!$('.aside').hasClass('active')) {
        $('.aside').addClass('active');
        $('.aside').animate({
            left: 0,
        });
    } else { 
        $('.aside').removeClass('active');
        $('.aside').animate({
            left: -375,
        });
    }
})

$('.main').click(function(){
    if($('.aside').hasClass('active')) { 
        $('.aside').removeClass('active');
        $('.aside').animate({
            left: -375,
        });
    }
})

$('.box_user .user_info_btn').on('click',function(){
    $('.box_user').animate({
        right: -900,
    })
})

