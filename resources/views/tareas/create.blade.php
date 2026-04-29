@extends('layouts.app')

@section('title', 'Crear tarea')

@section('content')
    <section class="panel">
        <h2 class="panel-title">Crear tarea</h2>

        <form action="{{ route('tareas.store') }}" method="POST">
            @csrf
            @include('tareas._form', ['submitLabel' => 'Guardar tarea'])
        </form>
    </section>
@endsection
