@extends('layouts.app')

@section('title', 'Editar tarea')

@section('content')
    <section class="panel">
        <h2 class="panel-title">Editar tarea</h2>

        <form action="{{ route('tareas.update', $tarea->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('tareas._form', ['submitLabel' => 'Actualizar tarea', 'tarea' => $tarea])
        </form>
    </section>
@endsection
