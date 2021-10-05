@extends('layouts.app_quest', ['titulopesq'  => 'Pesquisa não encontrada'])
@section('content')


<style>
/* body{height: 100vh; background: url("../img/team/bg_pesquisa.jpg") top center;  background-size: cover; } */
body{height: 100vh;  background: #ffedcb }
.tarja{ height: 180px; width: 100%; background-color: rgba(254, 47, 9, 0.2); text-align: center;}
.contgeral{ margin-top: -80px;     border-radius: 8px; }
.centro{ padding: 10px}
.titpesq{ background-color: #ff7700; height: 80px; width: 100%; padding: 20px; color: #fff; font-size: 22px; font-weight: bold;  position: relative; z-index: 1;}
.titpesqp{ padding: 20px; color: #999; font-size: 16px; background: #fff; border-radius: 8px; box-shadow: 0 3px 10px -4px rgb(0 0 0 / 45%); margin-top: -10px; position: relative; z-index: 0;}
.divquestoes{ padding: 20px; color: #555; font-size: 16px; margin-top: 10px; background: #fff;  border-radius: 8px; box-shadow: 0 3px 10px -4px rgb(0 0 0 / 45%) }
.container{ background-color: none;}
.pergunta{ color: #000; font-weight: bold; font-size: 18px;}
.notaimp{ font-weight: bold; color:#fff; font-size: 22px; padding: 2px 10px 2px 10px;   background: #ff7700; border-radius: 8px; box-shadow: 0 3px 10px -4px rgb(0 0 0 / 45%);} 
.centertela{ text-align: center; width: 100%; padding-top: 150px;}
.obrigado{ font-weight: bold; font-size:  40px; color: #fff; text-shadow: 2px 2px 4px #A1452B; opacity: 0;}
.obrigado2{ opacity: 0;}
</style>



<div class="centertela">
    <span class="obrigado"> Pesquisa não encontrada.</span><br>
    <span class="obrigado2"><img src="{{ asset('img') }}/logop.png" alt=""></span>
</div>



@endsection
@push('scripts')
<script>
$('.centertela').show();
$(".obrigado").delay(1000).animate({   opacity: '1', }, 1200, null);
$(".obrigado2").delay(1800).animate({   opacity: '1', }, 500, null);  


</script>
@endpush