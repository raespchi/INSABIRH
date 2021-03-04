@section('title', 'Registro | Paso 1')
@extends('layout')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro | Paso 1') }}</div>                

                <div class="card-body">
                    
                    <form id="form1" method="POST" action="{{ url('validarfc') }}">
                        @csrf

                        <div class="form-group row">

                            <label for="rfc" class="col-md-4 col-form-label text-md-right">  <button id="btnSubmit" type="submit" class="btn btn-primary btn-sm">
                                    {{ __('Validar RFC') }}
                                </button>        </label>

                            <div class="col-md-6">

                                <input style="text-transform:uppercase" id="rfc" type="text" class="form-control @error('rfc') @if ($errors->first('rfc')== 'Su rfc debe contener al menos 13 caracteres.')  is-invalid @else is-valid  @endif @enderror  @if(Session::has('mensaje'))  is-invalid @endif" name="rfc" value="{{ old('rfc') }}" required autocomplete="rfc" maxlength="13" autofocus pattern="[A-Za-z0-9]+" >

                            @error('rfc')                                  
                            @if ($errors->first('rfc')== 'Su rfc debe contener al menos 13 caracteres.')                            
                                <span class="text-danger" role="alert"><strong> {{ $errors->first('rfc') }} </strong></span>
                            @else
                                <span class="text-success" role="alert"><strong> {{ $errors->first('rfc') }} </strong></span>
                            @endif                                                                                            
                            @enderror

                             @if(Session::has('mensaje'))                              
                                <span class="text-danger" role="alert"><strong>{{ Session::get('mensaje') }}</strong></span>                                
                            @endif                       
                        
                                
                            </div>                                                                                                                                                
                        </div>                        
                    </form>
                    
                    <form id="form2" method="POST" action="{{ route('register') }}">   

                    @csrf 
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombres') }}</label>

                            <div class="col-md-6">
                                <input style="text-transform:uppercase"  id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

         
                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

                            <div class="col-md-6">
                                <input style="text-transform:uppercase" id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" >

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button id="btnGuard" type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                        </div>                    
                    </form>                                 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
