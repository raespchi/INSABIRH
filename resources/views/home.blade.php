@section('title', 'Talonarios 2021')
@extends('layout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>Bienvenid@ {{ Auth::user()->name }} {{ Auth::user()->last_name }}</h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif             

<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Aquí usted</strong> podrá ver un listado de sus quincenas pagadas durante el año 2021.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>                                  

<table class="table table-hover table-bordered" id="xml" class="display">
      <thead>
        <tr>
            <th><div class="row d-flex justify-content-center">Quincena</div></th>    
            <th><div class="row d-flex justify-content-center">XML & PDF</div></th>                        
        </tr>
      </thead>    
        <tbody>  
          
            @foreach ($registros as $registro)
            <tr>

            <td><div class="row d-flex justify-content-center"><strong > {{$registro->quincena}} </strong></div></td>
            <td>

            <div class="row d-flex justify-content-center"> 

            <ul class="list-group list-group-horizontal">
              <li class="list-group-item">                
                <a href='../public/archivos/xml/2021/{{$registro->nombre_archivo}}.xml'><img src="../public/images/icono-XML.png " width="30px" height="30px" class="tooltip-test" title="Descargar XML"></a></li>

              <li class="list-group-item">
                <a href='../public/archivos/pdf/2021/{{$registro->nombre_archivo}}.pdf'><img src="../public/images/icono-PDF.png " width="30px" height="30px" title="Descargar PDF"></a></li>  
            </ul>
            
            </div>
            </td>
            
            </tr>      
            @endforeach

  
        </tbody>
</table>     

<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
