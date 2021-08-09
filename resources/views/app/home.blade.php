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
<body class='app_page'>
    <div class="content">

        <div class="aside">
            <div class="title">
                <i class="fas fa-chevron-left"></i>
                <div>
                    <div class="img">
                        @if($userInfo->image)
                            <img src="{{url('assets\app\images/'.$userInfo->image) }}" alt="user_image">
                        @else
                            <i class="fas fa-user"></i>
                        @endif
                    </div>
                    <h2>Meu perfil</h2>
                </div>
                <button>
                     <i class="fas fa-suitcase"></i>
                </button>
                    
            </div>
            <div class="sidebar_content">
                <div class="settings">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                    <div class="settings_wrapper">
                        
                        <h2>CONFIGURAÇÕES DA CONTA</h2>
                        <button class='email'>Email <span >{{ $userInfo->email }} <i class="fas fa-chevron-right"></i> </span></button>
                        <button class='phone'>Numero de telefone <span >{{ @$userInfo->phone }} <i class="fas fa-chevron-right"></i> </span></button>
                    </div>
                    <div class="settings_wrapper">
                        <h2>AJUSTE DE DESCOBERTA</h2>
                        <button class='sex'>Sexualidade <span >{{ @$userInfo->sex }} <i class="fas fa-chevron-right"></i> </span></button>
                        <button class='sexual_affinity'>Procurar por <span class='sexual_affinity'>{{ @$userInfo->sexual_affinity }} <i class="fas fa-chevron-right"></i></span></button>
                        <button class="visible">Mostrar-me no Tinder <div @if($userInfo->visible == '1') class='button actived' @else class='button' @endif><p class="circle "></p></div></button>
                        <p hidden id='id_from'>{{$userInfo->id }}</p>
                        <p hidden id='url_action'>{{ route('user.action') }}</p>
                    </div>
                    <button class='logout'>Logout</button>
                </div>
                <div class="chat">
                    <button class='matches_btn'>Matches</button>
                    <button class='messages_btn'>Mensagens</button>
                    <div class="box_content">
                        <div class="matches">
                            <div class="box_matches">
                                @if($matches->count() > 0)
                                    @foreach($matches as $Matches) 
                                        <div class="box_matches_single">
                                            <div class="box_img">
                                                <div class="img" style="background-image: url({{ url('assets/app/images/' . $Matches->image) }})"></div>
                                                <p></p>
                                            </div>
                                            <div class="info">
                                                <h2>{{$Matches->name}}</h2>
                                            </div>
                                            
                                        </div>
                                        
                                    @endforeach
                                @else
                                <div class="icon matches">
                                    <svg  class='first_card' width="127" height="174.99999999999997" xmlns="http://www.w3.org/2000/svg">
                                        <defs>
                                        <linearGradient y2="0" x2="1" y1="0" x1="0" id="svg_8">
                                        <stop offset="0" stop-color="#fd267a"/>
                                        <stop offset="1" stop-opacity="0.99609" stop-color="#ff7854"/>
                                        </linearGradient>
                                        </defs>
                                        <g>
                                        <rect id="svg_2" height="0" width="1" y="161" x="904.6" stroke="#000" fill="#fff"/>
                                        <rect stroke-width="0" stroke="#000" rx="7" id="svg_9" height="170" width="117" y="2" x="5" fill="url(#svg_8)"/>
                                        </g>
                                    </svg>
                                    <svg width="117" height="170" xmlns="http://www.w3.org/2000/svg">
                                        <defs>
                                        <radialGradient r="0.8045" cy="0.88281" cx="0.10938" spreadMethod="pad" id="svg_47">
                                        <stop offset="0" stop-opacity="0.96484" stop-color="#e0e0e0"/>
                                        <stop offset="0.99609" stop-opacity="0.97266" stop-color="#ffffff"/>
                                        </radialGradient>
                                        </defs>
                                        <g>
                                        <title>Layer 1</title>
                                        <rect id="svg_2" height="0" width="1" y="161" x="904.6" stroke="#000" fill="#fff"/>
                                        <rect stroke-width="0" stroke="#000" rx="7" id="svg_9" height="170" width="117" y="-0.17391" x="1.08695" fill="url(#svg_47)"/>
                                        </g>
                                    </svg>
                                    <svg width="117" height="170" xmlns="http://www.w3.org/2000/svg">
                                        <defs>
                                        <radialGradient r="0.8045" cy="0.82031" cx="0.16406" spreadMethod="pad" id="svg_43">
                                        <stop offset="0" stop-opacity="0.98047" stop-color="#eaeaea"/>
                                        <stop offset="0.99609" stop-opacity="0.97266" stop-color="#ffffff"/>
                                        </radialGradient>
                                        </defs>
                                        <g>
                                        <title>Layer 1</title>
                                        <rect id="svg_2" height="0" width="1" y="161" x="904.6" stroke="#000" fill="#fff"/>
                                        <rect stroke-width="0" stroke="#000" rx="7" id="svg_9" height="170" width="117" y="-0.17391" x="0" fill="url(#svg_43)"/>
                                        </g>
                                    </svg>
                                </div>
                                <h2>Comece a dar </br>Matches</h2>
                                <p>Lorem ipsum dolor slo Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio, pariatur. Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit autem veniam porro praesentium ut dolores!!</p>
                                @endif
                            </div>
                        </div>
                        

                        <div class="messages">
                            @if($chat->count() > 0 && $matches->count() > 0)  
                            <div class="box_chat">

                                @foreach($chat as $Chat)
                                    @foreach($matches as $matc)
                                        @if($matc->id == $Chat->user_one || $matc->id == $Chat->user_two)
                                        <div class="box_chat_single" id='{{$Chat->id}}'>
                                            <div class="box_img">
                                                <div class="img" style="background-image: url({{ url('assets/app/images/' . $matc->image) }})"></div>
                                                <p></p>
                                            </div>
                                            <div class="info">
                                                <h2>{{$matc->name}}</h2>
                                                <p hidden class='chat_url'>{{ route('user.messages') }}</p>
                                            </div>
                                        </div>
                                        @endif

                                    @endforeach
                                @endforeach
                            </div>
                            
                            @else
                            <div class="chat_intro">
                                <div class="icon chat">
                                <svg width="196" height="195" xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                    <title>Layer 1</title>
                                    <rect fill="#fff" stroke="#000" x="904.6" y="161" width="1" height="0" id="svg_2"/>
                                    <path fill="url(#svg_40)" stroke-width="0" opacity="undefined" d="m100.88145,18.13217c-48.75594,0 -88.28741,29.48664 -88.28741,65.86279c0,20.80647 12.97718,39.34484 33.18187,51.41044c-2.87484,10.69705 -8.61207,22.54485 -19.70063,33.02376c0,0 25.88308,-1.923 44.16471,-22.73229c1.05247,0.28975 2.14188,0.50784 3.2043,0.77539c-0.99846,-3.34415 -1.58627,-6.8206 -1.58627,-10.43774c0,-24.54227 24.34368,-43.75948 55.43515,-43.75948c22.33181,0 41.12265,9.95207 49.96822,24.6361c7.53016,-9.69283 11.90744,-20.91965 11.90744,-32.92454c0,-36.36779 -39.53147,-65.85443 -88.28737,-65.85443l-0.00001,0z" id="svg_23" fill-opacity="0.47" stroke="#000"/>
                                    <path fill="url(#svg_35)" stroke-width="0" d="m174.46226,135.92996c0,-20.56069 -20.7275,-37.2413 -46.31141,-37.2413c-25.56995,0 -46.30913,16.68061 -46.30913,37.2413c0,20.57173 20.73918,37.24403 46.30913,37.24403c5.66304,0 11.05654,-0.85757 16.07107,-2.35316c9.58725,11.77175 23.16378,12.8542 23.16378,12.8542c-5.81408,-5.92677 -8.81768,-12.62389 -10.32888,-18.67703c10.59166,-6.81501 17.40545,-17.29643 17.40545,-29.06804l-0.00001,0z" id="svg_33" stroke="#000"/>
                                    </g>
                                    <defs>
                                    <linearGradient id="svg_35" x1="0" y1="0" x2="1" y2="0" spreadMethod="pad">
                                    <stop stop-color="#fd267a" stop-opacity="0.99609" offset="0"/>
                                    <stop stop-color="#ff7854" stop-opacity="0.99609" offset="1"/>
                                    </linearGradient>
                                    <radialGradient id="svg_40" spreadMethod="pad" cx="0.1875" cy="0.79766" r="0.91874">
                                    <stop stop-color="#a3a3a3" stop-opacity="0.98047" offset="0"/>
                                    <stop stop-color="#ffffff" stop-opacity="0" offset="1"/>
                                    </radialGradient>
                                    </defs>
                                </svg>
                                </div>
                                <h2>Diga olá</h2>
                                <p>Lorem ipsum dolor slo Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio, pariatur. Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit autem veniam porro praesentium ut dolores!!</p>
                            </div>
                            @endif
                        </div>
                    </div>   
                </div>
                
                    
                
            </div>
        </div>
        
        <div class="main">
            
            <div class="settings_user">
                <div class="menu_btn_mobile"><i class="fas fa-bars"></i></div>
                <div class="box_card">
                    
                    <div class="card_content" style="background: rgba(0,0,0,0.1) url('http://localhost/Tinder-Clone/public/assets/app/images/{{$userInfo->image}}')">
                        <div>
                            <h2>{{ $userInfo->name }} <span>{{ $userInfo->age}}</span></h2>             
                        </div>            
                    </div>
                    <div class="icons">
                        <form enctype="multipart/form-data" id='form_image'>
                            <input hidden type="file" name='image' id='input_file'>
                            <input hidden type="submit">
                        </form>
                    </div>
                </div>
            </div>
            <div class="main_user">
                <div class="cards">
                <div class="menu_btn_mobile"><i class="fas fa-bars"></i></div>
                    @if(!isset($users))
                        @if($userInfo->visible == '0') 
                            <h2 class='not_found'>Você não esta visivel!</h2>
                        @else
                            <h2 class='not_found'>Não há pessoas disponiveis!</h2>
                        @endif
                    @else
                    <div class="box_card users">
                    
                        <div class="card_content" style="background: rgba(0,0,0,0.1) url('http://localhost/Tinder-Clone/public/assets/app/images/<?php echo @$users->image ?>')">
                            <div>
                                <h2>{{ @$users->name }} <span>{{ @$users->age}}</span><p hidden id='id_to'>{{ @$users->id }}</p></h2>
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
                    @endif
                </div>
                <div class="chat"  style="display: none">
                    <div class="box_chat">
                        <div class="user_info"></div>
                        <div class="box_messages"></div>
                        <div class="btn">
                            <input type="text" placeholder='Type a message' id="message">
                            <button class='sendMessage'>SEND</button>
                            <p hidden id='sendMessage'>{{route('user.send_message') }}</p>
                        </div>             
                    </div>
                    <div class="box_user">
                        <div class='user_info_btn'>
                            <i class="fas fa-ellipsis-v"></i>
                        </div>
                        <div class="user_info">
                        </div>
                        
                        <div class="btn">
                            <button class='unmatch' url="{{ route('user.action') }}">UNMATCH</button>
                            <button class='report'>REPORT</button>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <script src="{{url('assets\app\js\jquery.min.js') }}"></script>
    <script src="{{url('assets\app\js\jquery.mask.js') }}"></script>
    <script src="{{url('assets\app\js\app.js') }}"></script>
    <script>
        $('button.logout').click(function(){
            window.location.href = '{{ route('logout') }}';
        })
        // Get Location

        getLocation();

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(UpdateLocation);
            } else { 
                alert("Geolocation is not supported by this browser.")
            }
        }

        function UpdateLocation(position) {
            let lat = position.coords.latitude;
            let long = position.coords.longitude;
            var url = '{{ route('user.update_location') }}';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'post',
                url: url,
                data: {'lat': lat,'long': long, 'id':{{ session('LoggedUser') }}}
            })

            @isset($users)
                $('.location').html(Math.round(getDistanceFromLatLonInKm(lat,long,{{@$users->lat}},{{@$users->long}})));
            @endisset
            function getDistanceFromLatLonInKm(lat1, lon1, lat2, lon2) {
                    var R = 6371; // Radius of the earth in km
                    var dLat = deg2rad(lat2-lat1);  // deg2rad below
                    var dLon = deg2rad(lon2-lon1); 
                    var a = 
                        Math.sin(dLat/2) * Math.sin(dLat/2) +
                        Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
                        Math.sin(dLon/2) * Math.sin(dLon/2)
                        ; 
                    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
                    var d = R * c; // Distance in km
                    return d;
                }

                function deg2rad(deg) {
                return deg * (Math.PI/180)
                }
           
        }
    </script>
</body>
</html>