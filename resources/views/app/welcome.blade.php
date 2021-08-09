<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="description" content="Clone do Tinder">
    <meta name="keywords" content="HTML, CSS, JavaScript, Laravel">
    <meta name="author" content="Joao Paulo Verzeletti Nogueira">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url(mix('assets/app/css/style.css')) }}">
    <link rel="icon" href="{{url('assets\icon.ico') }}">
    <title>Tinder Clone</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">


</head>
<body>
    <section class="main">
        <header>
            <div class="nav">
                <div class="menu">
                    <a href="" class="logo"><i class="fas fa-fire"></i> tinder</a>
                    <ul class='menu_links'>
                        <li><a href="" class='drop_menu_link'>Produtos</a></li>
                        <li><a href="">Saiba mais</a></li>
                        <li><a href="">Suport</a></li>
                        <ul class='drop_menu'>
                            <li><a href="">Recursos Premium</a></li>
                            <li><a href="">Categoria de assinatura</a></li>
                            <ul>
                                <li><a href="">Tinder Plus</a></li>
                                <li><a href="">Tinder Gold™</a></li>
                                <li><a href="">Tinder Platinum™</a></li>
                            </ul>
                                
                        </ul>
                    </ul>
                </div>
                <div class="login">
                    <button class="language"><i class="fas fa-globe-americas"></i>  PORTUGUÊS (BRASIL)</button>
                    <a href="" class='enter'>ENTRE</a>
                    <button class="register">CRIE UMA CONTA</button>
                    <div class="menu_mobile">
                        
                        <i class="fas fa-bars menu_btn"></i>
                        <div class="menu_mobile_box">
                            <a href="" class="logo"><i class="fas fa-fire"></i> tinder</a>
                            <div class="close_menu"><i class="fas fa-times"></i></div>
                            <ul class='menu_links_mobile'>
                                <li class='drop_menu_link_mobile'>Produtos<i class="fas fa-chevron-down"></i></li>
                                <ul class='drop_menu_mobile'>
                                    <li><a href="">Recursos Premium</a></li>
                                    <li><a href="">Categoria de assinatura</a></li>
                                    <ul>
                                        <li><a href="">Tinder Plus</a></li>
                                        <li><a href="">Tinder Gold™</a></li>
                                        <li><a href="">Tinder Platinum™</a></li>
                                    </ul>                          
                                </ul>
                                <li><a href="">Saiba mais</a></li>
                                <li><a href="">Suport</a></li>
                            </ul> 
                            <div class='menu_login'>
                                <a href="" class='enter_mobile'>ENTRE</a>
                                <button class="language_mobile"><i class="fas fa-globe-americas"></i> Português (Brasil)</button>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </header>

        <div class="text">
                <h2>Deslize para a direita</h2>
                <button class="register">CRIE UMA CONTA</button>
        </div>
        <a href="" class='google_icon'><img src="{{url('assets\app\images\google.jpg') }}" alt=""></a>
    </section>
    
 
    <div class="depositions">
        <div class="center">
            <div class="box_deposition_single">
                <h2>Julia</h2>
                <div class="icons">
                    <div class="hr"></div><i class="fas fa-quote-left"></i>
                    
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint necessitatibus omnis ipsum voluptatibus magnam quibusdam est nesciunt voluptatum ex veniam rerum quis, vitae tempore earum.</p>
            </div>

            <div class="box_deposition_single">
                <h2>Carlos</h2>
                <div class="icons">
                    <div class="hr"></div><i class="fas fa-quote-left"></i>
                    
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint necessitatibus omnis ipsum voluptatibus magnam quibusdam est nesciunt voluptatum ex veniam rerum quis, vitae tempore earum.</p>
            </div>

            <div class="box_deposition_single">
                <h2>João</h2>
                <div class="icons">
                    <div class="hr"></div><i class="fas fa-quote-left"></i>
                    
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint necessitatibus omnis ipsum voluptatibus magnam quibusdam est nesciunt voluptatum ex veniam rerum quis, vitae tempore earum.</p>
            </div>
        </div>
    </div>

    <footer>
        <div class="center">
            <div class="box_single">
                <h2>SEGURANÇA</h2>
                <a href="">Regras da comunidade</a>
                <a href="">Dicas de segurança</a>
                <a href="">Segurança e Política</a>
                <a href="">Segurança de denúncia</a>
                <a href="">Segurança</a>
            </div>
            <div class="box_single">
                <h2>JURÍDICO</h2>
                <a href="">Privacidade</a>
                <a href="">Termos</a>
                <a href="">Política de Cookies</a>
                <a href="">Propriedade Intelectual</a>
            </div>
            <div class="box_single">
                <h2>EMPREGOS</h2>
                <a href="">Portal de empregos</a>
                <a href="">Blog de tecnologia</a>
            </div>
            <div class="box_single">
                <h2>REDES SOCIAIS</h2>
                <div class="icons">
                    <a href=""><i class="fab fa-instagram"></i></a>
                    <a href=""><i class="fab fa-tiktok"></i></a>     
                    <a href=""><i class="fab fa-youtube"></i></a>
                    <a href=""><i class="fab fa-twitter"></i></a>
                    <a href=""><i class="fab fa-facebook-f"></i></a>
                </div>
                
            </div>
            <div class="box_single">
                <h2></h2>
                <a href="">Perguntas frequentes</a>
                <a href="">Destinos</a>
                <a href="">Assesoría de Imprensa</a>
                <a href="">Contato</a>
                <a href="">Codigo promocional</a>
            </div>

            <div class="hr"></div>
            <div class="box_single">
                <div>
                    <h2>BAIXE O APLICATIVO!</h2>
                    <a href="" class='appStore'><img src="{{url('assets\app\images\appStore.jpg') }}" alt=""></a>
                    <a href=""><img src="{{url('assets\app\images\google.jpg') }}" alt=""></a>
                </div>
                
                <p>
                    Essa é para solteiros e solteiras, preste atenção: se você estiver procurando um relacionamento, quiser começar a sair para encontros ou deixar tudo numa 
                    vibe mais casual, você precisa estar no Tinder. Com mais de 55 bilhões de Matches, o Tinder é o lugar certo para conhecer seu próximo Match perfeito. Vamos 
                    mandar a real, o cenário de encontros está diferente hoje e a maioria das pessoas estão se conhecendo online. Com o Tinder, o app gratuito mais popular do 
                    mundo, você tem acesso a milhões de solteiros, na palma da sua mão, que estão loucos para paquerar e conhecer alguém como você. Não importa se você é hétero 
                    ou membro da comunidade LGBTQIA, o Tinder existe para te ajudar a encontrar Matches perto de você.
                </p>
                <p>
                    O Tinder agrada todo mundo. Quer um relacionamento? Nós ajudamos você. Quer fazer novos amigos? Nem precisa dizer mais nada. Acabou de chegar no 
                    campus e quer aproveitar sua experiência universitária ao máximo? O Tinder U te dá cobertura. O Tinder não é um site de relacionamento comum, é o 
                    app de relacionamento com mais diversidade, onde adultos com experiências diferentes são convidados a criar conexões, memórias e muito mais.
                </p>
            </div>
            <div class="hr"></div>
        </div>
        <div class="footer">
        
            <div class="links">
                <a href="">Perguntas frequentes</a>
                <a href="">Dicas de segurança</a>
                <a href="">Termos</a>
                <a href="">Política de Cookies</a>
                <a href="">Configuração de Privacidade</a>
            </div>
            
            <p>© 2021 Match Group, LLC, Todos os direitos reservados.</p>
        </div>
    </footer>

      <div class="modal_login" @if(Session::get('fail') || Session::get('error')) style="display:block" @endif @error('email') style='display:block' @enderror @error('password') style='display:block' @enderror>
        <div class="box_modal">
            <div class="close"><i class="fas fa-times"></i></div>
            <i class="fas fa-fire"></i>
            <h2>VAMOS COMEÇAR</h2>
            <form class='form_login' method='post' action='{{ route("validate_user") }}'>
                @csrf
                <input type="email" name='email' placeholder="Email" value="{{old('email')}}">
                @if(Session::get('fail')) <p class='error'> {{Session::get('fail')}} </p> @endif
                @error('email')<p class='error'>{{ $message }} </p>@enderror
                <input type="password" name='password' placeholder="Password">
                @if(Session::get('error')) <p class='error'> {{Session::get('error')}} </p> @endif
                @error('password') <p class='error' style='margin-bottom: 20px'>{{ $message }} </p>@enderror
                <button type="submit">ENTRAR COM SUA CONTA</button>
            </form>
            <h2>OU</h2>
            <button class="modal_register_link">CRIE JA SUA CONTA</button>
        </div>
      </div>

      <div class="modal_register">
      <meta name="csrf-token" content="{{ csrf_token() }}" />
        <div class="box_modal">
            <div class="close"><i class="fas fa-times"></i></div>
            <i class="fas fa-fire"></i>
            <h2>CRIE UMA CONTA</h2>
            <form class="register_form">
                @csrf
                <input type="text" name='name' placeholder="Name">
                <p class='name error'></p>
                <input type="email" name='email' placeholder="Email">
                <p class='email error'></p>
                <input type="password" name='password' placeholder="Password">
                <p  class='password error' style='margin-bottom: 20px'></p>
                <input hidden name='url' value='{{ url()->current() }}'>
                <button class="modal_register_btn">CRIE JA SUA CONTA</button>
            </form>
            <h2>OU</h2>
            <button class="modal_login_btn">ENTRAR COM SUA CONTA</button>
        </div>
      </div>
      <script src="{{url('assets\app\js\jquery.min.js') }}"></script>
      <script src="{{url('assets\app\js\app.js') }}"></script>
      <script src="{{url('assets\app\js\register_ajax.js') }}"></script>
    </body>
</html>