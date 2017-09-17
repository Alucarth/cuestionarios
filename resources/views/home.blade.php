<?php 
use App\Preguntas;
$id = null;
?>

@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">Profesor : Alfredo Tarquino lecoña <br> Materia: Matematicas </div>

                <div class="panel-body">
                   <div class="alert alert-info" role="alert"> Para realizar la siguiente evaluacion usted debera marcar una de las tres opciones.<br>
                   1:BUENO<br>
                   2:REGULAR<br>
                   3:MALO<br>

                   </div>

                   <form action="{{url('encuestas')}}" method="post"> 
                    {{ csrf_field() }}
                       <table class="table table-bordered">


                            @foreach ($secciones as $seccion)
                               <tr> 
                               <td></td><td>  <strong> <?php echo $seccion['descripcion']; ?></strong></td><td> 3</td><td> 2</td><td> 1</td>
                               </tr>

                                @foreach ( $seccion['preguntas']  as $pregunta)
                                   <tr> 
                                   <td><?php echo $pregunta['numeracion']; ?></td><td> {{$pregunta['descripcion']}}</td>
                                   <td> <input type="hidden" name="ids[id][] " value="{{$pregunta['id']}}"> 
                                        <input type="radio" name="respuestas[{{$pregunta['id']}}]" value="3"></td>

                                   <td> <input type="radio" name="respuestas[{{$pregunta['id']}}]" value="2"></td>

                                   <td> <input type="radio" name="respuestas[{{$pregunta['id']}}]" value="3"></td>
                                   </tr>

                                @endforeach

                            @endforeach

                       </table>
                        <button type="submit" class="btn btn-primary"> <span class="glyphicon glyphicon-floppy-disk"></span>Guardar  </button>
                    </form>
                  

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
