@section('title', 'Registro | Paso 2')

@extends('layout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strons>Aviso!!</strons></div>

                <div class="card-body">

                   <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Se le envió un correo para que pueda activar su cuenta.                        
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection