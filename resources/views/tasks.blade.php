@extends('layouts.app')

@section('content')

    <style>
    body, .panel-heading {
        background-color: rgb(121, 118, 118);
    }
    footer{
        text-align: center;
        color: rgb(36, 35, 35);
        position: relative ;
        bottom: 0;
        width: 100%;
        height: 100%;
        
        padding-top: 10px;
    }
    a{
        color:rgb(36, 35, 35);
    }
    </style>

    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Nova Tarefa
                </div>

                <div class="panel-body">
                    <!-- Errors -->
                    @include('common.errors')

                    <!-- Nova Tarefa [Form] -->
                    <form action="{{ url('task')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!--Tarefa-->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Tarefa</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">
                            </div>
                        </div>

                        <!-- add Tarefa [Button] -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Adicionar Tarefa
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Tarefas em andamento -->
            @if (count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tarefa Atual
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Tarefas em Andamento</th>
                                <th>&nbsp;</th>
                            </thead>

                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td class="table-text"><div>{{ $task->name }}</div></td>

                                        <!-- Deletar Tarefa [Button] -->
                                        <td>
                                            <form action="{{ url('task/'.$task->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Excluir
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
            <!--Rodapé -->
            <footer>
                <div class="footer-copyright text-center">
                    <h6 class="text-center"> ToDo-List © 2020 Created by <a href="https://www.linkedin.com/in/guilherme-lima-marinho-242635196/">  Guilherme Marinho</a></h6>
                </div>
            </footer>
        </div>
    </div>
@endsection