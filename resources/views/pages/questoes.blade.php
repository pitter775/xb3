@extends('layouts.app_quest')
@section('content')

<style>
body{height: 100vh; background: url("../img/bg_pesquisa.jpg") top center;  background-size: cover; }
.tarja{ height: 180px; width: 100%; background-color: rgba(254, 47, 9, 0.2); text-align: center;}
.contgeral{ margin-top: -80px;     border-radius: 8px; }
.centro{ padding: 10px}
.titpesq{ background-color: #ff7700; height: 80px; width: 100%; padding: 20px; color: #fff; font-size: 22px; font-weight: bold;  position: relative; z-index: 1;}
.titpesqp{ padding: 20px; color: #999; font-size: 16px; background: #fff; border-radius: 8px; box-shadow: 0 3px 10px -4px rgb(0 0 0 / 45%); margin-top: -10px; position: relative; z-index: 0;}
.divquestoes{ padding: 20px; color: #555; font-size: 16px; margin-top: 10px; background: #fff;  border-radius: 8px; box-shadow: 0 3px 10px -4px rgb(0 0 0 / 45%) }
.container{ background-color: none;}
.pergunta{ color: #000; font-weight: bold; font-size: 18px;}
</style>



<div class="tarja">
<img src="{{ asset('img') }}/logop.png" alt="" class="centro">
</div>
<div class="container">
    <div class="contgeral" style="margin-bottom: 20px;">
        <div class="titpesq">
            {{$data->name}}
        </div>
        <div class="titpesqp">
            Preencha todas as questões para poder enviar a pesquisa 
        </div>   
        <form name="form_informacoes" id="form_informacoes" style="margin-bottom: 20px;">
            @csrf
            @foreach($data->questions as $key => $value)
                <div class="divquestoes">
                    <p class="pergunta">{{$value->description}} </p>
                    @switch($value->type)

                        @case('MULTIPLE_CHOICE')
                            @foreach($value->restrictions->options as $key => $val)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault{{$key}}"/>
                                <label class="form-check-label" for="flexRadioDefault{{$key}}"> {{$val->description}} </label>
                            </div>
                            @endforeach
                        @break

                        @case('RANGE')
                            <div class="range" style="margin: 40px 20px">
                                <input type="range" class="form-range" min="0" max="10" step="1"  id="customRange1" />
                            </div>
                            <script>
                                var x = document.getElementById("customRange1");
                                var defaultVal = x.defaultValue;
                                console.log(defaultVal);
                            </script>
                        @break

                        @case('CHECKBOX')
                            @foreach($value->restrictions->options as $key => $val)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="flexCheckDefault" id="flexCheckDefault{{$key}}"/>
                                <label class="form-check-label" for="flexCheckDefault{{$key}}"> {{$val->description}} </label>
                            </div>
                            @endforeach
                        @break

                        @case('TEXT')
                            
                            <div class="form-outline">
                                <textarea class="form-control" id="textAreaExample" rows="4"></textarea>
                                <label class="form-label" for="textAreaExample">Message</label>
                            </div>
                          
                        @break


                    @endswitch
                    
                </div>
            @endforeach
            

            <div class="divquestoes" >
                <button type="submit" class="btn btn-outline-success btn-sm btn-rounded waves-effect "><i class="fas fa-save"></i> Enviar </button>  
            </div>
            <div style="height: 20px;"></div>
     
        </form>
    </div>
</div>



@endsection
@push('scripts')
<script>

</script>
@endpush