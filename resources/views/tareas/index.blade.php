@extends('layouts.app')

@section('title', 'Listado de tareas')

@section('content')
    <section class="panel">
        <div class="actions" style="justify-content: space-between; margin-bottom: 1.25rem;">
            <h2 class="panel-title" style="margin: 0;">Listado de tareas</h2>
            <a href="{{ route('tareas.create') }}" class="btn btn-primary">Crear tarea</a>
        </div>

        @if ($tareas->isEmpty())
            <div class="empty-state">
                <p>No hay tareas registradas todavía.</p>
                <p>Crea la primera para comenzar.</p>
            </div>
        @else
            <div class="task-list">
                @foreach ($tareas as $tarea)
                    <article class="task-item {{ $tarea->completada ? 'completed' : '' }}">
                        <div>
                            <h3 class="task-title {{ $tarea->completada ? 'completed' : '' }}">
                                {{ $tarea->titulo }}
                            </h3>

                            @if ($tarea->descripcion)
                                <p class="task-description">{{ $tarea->descripcion }}</p>
                            @endif

                            <div class="task-meta">
                                <span class="badge badge-{{ $tarea->prioridad }}">
                                    Prioridad: {{ ucfirst($tarea->prioridad) }}
                                </span>
                                <span>Estado: {{ $tarea->completada ? '✓ Completada' : 'Pendiente' }}</span>
                                <span>Fecha límite: {{ $tarea->fecha_limite?->format('d/m/Y') ?? 'Sin fecha' }}</span>
                            </div>
                        </div>

                        <div class="task-buttons">
                            <form class="inline-form" action="{{ route('tareas.toggle', $tarea->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-secondary">
                                    {{ $tarea->completada ? 'Marcar pendiente' : 'Marcar completada' }}
                                </button>
                            </form>

                            <a href="{{ route('tareas.edit', $tarea->id) }}" class="btn btn-primary">Editar</a>

                            <form
                                class="inline-form"
                                action="{{ route('tareas.destroy', $tarea->id) }}"
                                method="POST"
                                onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta tarea?');"
                            >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </section>
@endsection
