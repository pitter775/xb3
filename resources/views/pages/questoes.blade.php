<?php

    $array_layout_default = [
        'cores1' => '#A1452B',
        'cores2' => '#ff7700',
        'cores3' => '#ffedcb',
        'cores4' => 'rgba(254, 47, 9, 0.2)',
        'tema' => '#612400',
        'img' => 'logop.png',
        'img_icone' => 'logop.png',
        'imgwhats' => 'logowhats2.jpg',
        'tit' => 'XB3 Soluções - Pesquisa',
        'titpesq' => $data->name
    ];
    
    $array_layout_crefisa = [
        'cores1' => '#2b4fa1',
        'cores2' => '#00537f',
        'cores3' => '#ecf8fe',
        'cores4' => 'rgba(0, 83, 127, 0.2)',
        'tema' => '#00537f',
        'img' => 'logop_crefisa.png',
        'img_icone' => 'icon_crefisa.png',
        'imgwhats' => 'logowhats_crefisa.jpg',
        'tit' => 'Crefisa - Pesquisa',
        'titpesq' => $data->name
    ];


    
    $layout_ativo = $array_layout_default;
    if($data->presentationLayer == 'crefisa'){ $layout_ativo = $array_layout_crefisa; }


    
    ?>


@extends('layouts.app_quest', ['dados' => $layout_ativo])
@section('content')
    


    <style>
        /* body{height: 100vh; background: url("../img/team/bg_pesquisa.jpg") top center;  background-size: cover; } */
        body {
            height: 100vh;
            background: <?php echo $layout_ativo['cores3']; ?>;
        }

        .tarja {
            height: 180px;
            width: 100%;
            background-color: <?php echo $layout_ativo['cores4']; ?>;
            text-align: center;
        }

        .contgeral {
            margin-top: -80px;
            border-radius: 8px;
        }

        .centro {
            padding: 10px
        }

        .titpesq {
            background-color: <?php echo $layout_ativo['cores2']; ?>;
            width: 100%;
            padding: 25px;
            color: #fff;
            font-size: 22px;
            font-weight: bold;
            position: relative;
            z-index: 1;
        }

        .titpesqp {
            padding: 20px;
            color: #999;
            font-size: 16px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 3px 10px -4px rgb(0 0 0 / 45%);
            margin-top: -10px;
            position: relative;
            z-index: 0;
        }

        .divquestoes {
            padding: 20px;
            color: #555;
            font-size: 16px;
            margin-top: 10px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 3px 10px -4px rgb(0 0 0 / 45%)
        }

        .container {
            background-color: none;
        }

        .pergunta {
            color: #000;
            font-weight: bold;
            font-size: 18px;
        }

        .notaimp {
            font-weight: bold;
            color: #fff;
            font-size: 22px;
            padding: 2px 10px 2px 10px;
            background: <?php echo $layout_ativo['cores2']; ?>;
            border-radius: 8px;
            box-shadow: 0 3px 10px -4px rgb(0 0 0 / 45%);
        }

        .centertela {
            text-align: center;
            width: 100%;
            padding-top: 150px;
        }

        .obrigado {
            font-weight: bold;
            font-size: 50px;
            color: #fff;
            text-shadow: 2px 2px 4px <?php echo $layout_ativo['cores1']; ?>;
            opacity: 0;
        }

        .obrigado2 {
            opacity: 0;
        }

    </style>



    <div class="tarja">
        <img src="{{ asset('img') }}/<?php echo $layout_ativo['img']; ?>" alt="" class="centro">
    </div>
    <div class="container">
        <div class="contgeral" style="margin-bottom: 20px;">
            <div class="titpesq">
                {{ $data->name }}
            </div>
            <div class="titpesqp">
                Preencha todas as questões para poder enviar a pesquisa
            </div>
            <form name="form_informacoes" id="form_informacoes" style="margin-bottom: 20px;">
                @csrf
                <input type="hidden" name="surveyId" value="{{ $data->id->surveyId }}" />
                @foreach ($data->questions as $keyy => $value)
                    <div class="divquestoes" data-mandatory='{{ $value->mandatory }}' data-type="{{ $value->type }}"
                        id="qt-{{ $keyy }}" data-qt='qt-{{ $keyy }}' data-feito="0">
                        <p class="pergunta">{{ $value->description }} </p>
                        @switch($value->type)
                            @case('MULTIPLE_CHOICE')
                                @foreach ($value->restrictions->options as $key => $val)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="qt-{{ $keyy }}"
                                            id="qt-{{ $keyy }}-{{ $key }}" data-ordem="{{ $keyy }}" />
                                        <label class="form-check-label" for="qt-{{ $keyy }}-{{ $key }}">
                                            {{ $val->description }} </label>
                                    </div>
                                @endforeach
                            @break

                            @case('RANGE')
                                <div class="range" style="margin: 40px 20px">
                                    <input type="range" class="form-range rangein" min="{{ $value->restrictions->lowBound }}"
                                        max="{{ $value->restrictions->highBound }}" data-id="qt-{{ $keyy }}"
                                        name="qt-{{ $keyy }}" data-notaid="nota-{{ $keyy }}" step="1"
                                        id="qt-{{ $keyy }}" data-ordem="{{ $keyy }}" />
                                    <p><span id="nota-{{ $keyy }}" class="notaimp">0</span></p>
                                </div>
                            @break

                            @case('CHECKBOX')
                                @foreach ($value->restrictions->options as $key => $val)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="qt-{{ $keyy }}[]"
                                            id="qt-{{ $keyy }}-{{ $key }}" data-ordem="{{ $keyy }}" />
                                        <label class="form-check-label" for="qt-{{ $keyy }}-{{ $key }}">
                                            {{ $val->description }} </label>
                                        <input type="hidden" name="qt-{{ $keyy }}-{{ $key }}" />
                                    </div>
                                @endforeach
                            @break

                            @case('TEXT')
                                <div class="form-outline">
                                    <textarea class="form-control inputtext" name="qt-{{ $keyy }}" id="qt-{{ $keyy }}" rows="4"
                                        data-ordem="{{ $keyy }}"></textarea>
                                    <label class="form-label" for="qt-{{ $keyy }}">Message</label>
                                </div>
                            @break
                        @endswitch
                    </div>
                @endforeach

                <div class="divquestoes">
                    <button type="submit" class="btn btn-success  waves-effect " style="font-size: 20px;" disabled><i
                            class="fas fa-save"></i> Enviar </button>
                </div>
                <div style="height: 20px;"></div>

            </form>
        </div>
    </div>
    <div class="centertela">
        <span class="obrigado"> Obrigado por sua participação!</span><br>
        <span class="obrigado2"><img src="{{ asset('img') }}/{{$layout_ativo['img']}}" alt=""></span>
    </div>
@endsection
@push('scripts')
    <script>
        var appUrl = "{{ env('APP_URL') }}";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.centertela').hide();
        $('.notaimp').hide();

        $(".divquestoes").change(function() {
            verificatudo();
        });
        var latitute = 0;
        var longitude = 0;
        getLocation();

        let dados2 = openGet('https://survy.xb3solucoes.com.br/rest/survey/<?php echo $dadosid; ?>')
        let lista = JSON.parse(dados2);
        // console.log('lista');
        // console.log(lista);
        // console.log('lista2');
        // console.log(lista['alreadyAnswered']);


        if (lista['alreadyAnswered']) {
            $('.tarja').animate({
                opacity: '0',
            }, {
                easing: 'swing',
                duration: 500,
                complete: function() {
                    $('.tarja').hide();
                }
            });
            $('.contgeral').animate({
                marginTop: '-350px',
                opacity: '0',
            }, {
                easing: 'swing',
                duration: 500,
                complete: function() {
                    $('.contgeral').hide();
                }
            });
            $('.centertela').show();
            $(".obrigado").delay(1000).animate({
                opacity: '1',
            }, 1200, null);
            $(".obrigado2").delay(1800).animate({
                opacity: '1',
            }, 500, null);
        }

        function openGet(url) {
            let request = new XMLHttpRequest()
            request.open("GET", url, false)
            request.send()
            return request.responseText
        }


        function verificatudo() {
            $.each($('.divquestoes'), function() {
                var element = $(this);
                if (element.attr('data-type')) {
                    let type = element.attr('data-type');
                    switch (type) {
                        case 'MULTIPLE_CHOICE':
                            let name = $(this).attr('data-qt');
                            let val = $('input[name="' + name + '"]:checked').val();
                            if (val) {
                                $(this).attr('data-feito', '1');
                            };
                            break;
                        case 'CHECKBOX':
                            let name2 = element.attr('data-qt');
                            let val2 = $("input[name='" + name2 + "[]']");
                            let checked = false;
                            val2.each(function() {
                                if ($(this).is(':checked')) {
                                    checked = true;
                                    namecheck = $(this).attr('id');
                                    $('input[name="' + namecheck + '"]').val('on');
                                }
                            });
                            if (checked) {
                                $(this).attr('data-feito', '1');
                            } else {
                                $(this).attr('data-feito', '0');
                            }
                            break;
                        case 'TEXT':
                            let name3 = $(this).attr('data-qt');
                            let val3 = $('textarea[name="' + name3 + '"]').val();
                            if (val3) {
                                $(this).attr('data-feito', '1');
                            };
                            break;
                    }
                }
            });
            tudook = verificarquestoes();
            if (tudook) {
                $(':input[type="submit"]').prop('disabled', false);
                $(':input[type="submit"]').animate({
                    opacity: "1"
                }, 300);
            } else {
                $(':input[type="submit"]').prop('disabled', true);
                $(':input[type="submit"]').animate({
                    opacity: ".5"
                }, 300);
            }
            animarfeitas();
        }

        function verificarquestoes() {
            $.each($('.divquestoes'), function() {
                valid = true;
                var element = $(this);
                if (element.attr('data-feito') == '1') {
                    valid = true;
                } else {
                    if (element.attr('data-mandatory') == '1') {
                        valid = false;
                        return false;
                    }
                }
            });
            return valid;
        }

        function animarfeitas() {
            $.each($('.divquestoes'), function() {
                var element = $(this);
                if (element.attr('data-feito') == '1') {
                    element.animate({
                        backgroundColor: "#f0ffdf"
                    }, 1000);
                } else {
                    element.animate({
                        backgroundColor: "#fff"
                    }, 1000);
                }
            });
        }
        $(".rangein").change(function() {
            $(".notaimp").show()
            val = $(this).val();
            valid = $(this).attr('data-notaid');
            valid2 = $(this).attr('data-id');
            $('#' + valid + '').text(val);
            $('#' + valid2 + '').attr('data-feito', '1');
        });
        $("#form_informacoes").submit(function(e) {
            e.preventDefault();
            let form = $('#form_informacoes');
            let dadosform = dadosformall();
            // console.log(JSON.stringify(dadosform));
            $.ajax({
                url: 'https://survy.xb3solucoes.com.br/rest/public/answer/send',
                contentType: 'application/json',
                cache: false,
                method: 'POST',
                dataType: 'json',
                data: JSON.stringify(dadosform),
                success: function(data) {
                    $('.tarja').animate({
                        opacity: '0',
                    }, {
                        easing: 'swing',
                        duration: 500,
                        complete: function() {
                            $('.tarja').hide();
                        }
                    });
                    $('.contgeral').animate({
                        marginTop: '-350px',
                        opacity: '0',
                    }, {
                        easing: 'swing',
                        duration: 500,
                        complete: function() {
                            $('.contgeral').hide();
                        }
                    });
                    $('.centertela').show();
                    $(".obrigado").delay(1000).animate({
                        opacity: '1',
                    }, 1200, null);
                    $(".obrigado2").delay(1800).animate({
                        opacity: '1',
                    }, 500, null);
                }
            });
        });

        function dadosformall() {
            const now = Date.now();
            var data = {
                surveyAnswer: {
                    latitute: latitute, // se não for aceito o compartilhamento pelo usuário pode mandar 0
                    longitude: longitude, // se não for aceito o compartilhamento pelo usuário pode mandar 0
                    answerDateSec: now, // pegar o tempo em milisegundos EPOCH
                    surveyId: {
                        surveyId: $('input[name=surveyId]').val()
                    },
                    answers: []
                }
            };
            $('.divquestoes').each(function(i) {
                $('input[type=radio]').each(function() {
                    if ($(this).attr('data-ordem') == i) {
                        if (data['surveyAnswer']['answers'].length === i) {
                            data['surveyAnswer']['answers'].push({
                                "choices": []
                            });
                        }
                        if ($(this).is(':checked')) {
                            let val = $(this).attr('id');
                            val = val.replace('qt-', '');
                            val = val.split("-");
                            val = parseInt(val[1]);
                            data['surveyAnswer']['answers'][i]['choices'].push(val);
                        }
                    }
                });
                $('input[type=range]').each(function() {
                    if ($(this).attr('data-ordem') == i) {
                        data['surveyAnswer']['answers'].push({
                            "choices": [parseInt($(this).val())]
                        });
                    }
                });
                $('input[type=checkbox]').each(function() {
                    if ($(this).attr('data-ordem') == i) {
                        if (data['surveyAnswer']['answers'].length === i) {
                            data['surveyAnswer']['answers'].push({
                                "choices": []
                            });
                        }

                        idch = $(this).attr('id');
                        idch = idch.replace('qt-', '');
                        idch = idch.split("-");

                        if ($(this).is(':checked')) {
                            let val = parseInt(idch[1]);
                            data['surveyAnswer']['answers'][i]['choices'].push(val)
                        }
                    }
                });
                $('input[type=text], textarea').each(function() {
                    if ($(this).attr('data-ordem') == i) {
                        data['surveyAnswer']['answers'].push({
                            "text": $(this).val()
                        });
                    }
                });
            });
            return data;
        }

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                console.log("Seu browser não suporta Geolocalização.");
            }
        }

        function showPosition(position) {
            latitute = position.coords.latitude;
            longitude = position.coords.longitude;
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    console.log("Usuário rejeitou a solicitação de Geolocalização.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    console.log("Localização indisponível.");
                    break;
                case error.TIMEOUT:
                    console.log("A requisição expirou.");
                    break;
                case error.UNKNOWN_ERROR:
                    console.log("Algum erro desconhecido aconteceu.");
                    break;
            }
        }
    </script>
@endpush
