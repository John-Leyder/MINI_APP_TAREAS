@php
    $fechaLimite = old('fecha_limite', isset($tarea) && $tarea->fecha_limite ? $tarea->fecha_limite->format('Y-m-d') : '');
@endphp

<div class="form-grid">
    <div class="field @error('titulo') field-error @enderror">
        <label for="titulo">Título</label>
        <input
            type="text"
            id="titulo"
            name="titulo"
            maxlength="100"
            value="{{ old('titulo', $tarea->titulo ?? '') }}"
            required
        >
        @error('titulo')
            <span class="error-text">{{ $message }}</span>
        @enderror
    </div>

    <div class="field @error('descripcion') field-error @enderror">
        <label for="descripcion">Descripción</label>
        <textarea id="descripcion" name="descripcion" maxlength="500">{{ old('descripcion', $tarea->descripcion ?? '') }}</textarea>
        @error('descripcion')
            <span class="error-text">{{ $message }}</span>
        @enderror
    </div>

    <div class="field @error('prioridad') field-error @enderror">
        <label for="prioridad">Prioridad</label>
        <select id="prioridad" name="prioridad" required>
            <option value="baja" @selected(old('prioridad', $tarea->prioridad ?? 'media') === 'baja')>Baja</option>
            <option value="media" @selected(old('prioridad', $tarea->prioridad ?? 'media') === 'media')>Media</option>
            <option value="alta" @selected(old('prioridad', $tarea->prioridad ?? 'media') === 'alta')>Alta</option>
        </select>
        @error('prioridad')
            <span class="error-text">{{ $message }}</span>
        @enderror
    </div>

    <div class="field @error('fecha_limite') field-error @enderror">
        <label for="fecha_limite">Fecha límite</label>
        <input
            type="date"
            id="fecha_limite"
            name="fecha_limite"
            value="{{ $fechaLimite }}"
            min="{{ now()->format('Y-m-d') }}"
        >
        @error('fecha_limite')
            <span class="error-text">{{ $message }}</span>
        @enderror
    </div>

    <div class="actions">
        <button type="submit" class="btn btn-primary">{{ $submitLabel }}</button>
        <a href="{{ route('tareas.index') }}" class="btn btn-secondary">Cancelar</a>
    </div>
</div>
