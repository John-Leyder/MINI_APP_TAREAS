<?php

namespace Tests\Feature;

use App\Models\Tarea;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TareaControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_muestra_las_tareas_ordenadas_por_fecha_descendente(): void
    {
        $tareaAntigua = Tarea::create([
            'titulo' => 'Tarea antigua',
            'prioridad' => 'baja',
        ]);
        $tareaAntigua->forceFill([
            'created_at' => now()->subMinute(),
        ])->saveQuietly();

        $tareaReciente = Tarea::create([
            'titulo' => 'Tarea reciente',
            'prioridad' => 'alta',
        ]);
        $tareaReciente->forceFill([
            'created_at' => now(),
        ])->saveQuietly();

        $response = $this->get(route('tareas.index'));

        $response->assertOk();
        $response->assertSeeInOrder([$tareaReciente->titulo, $tareaAntigua->titulo]);
    }

    public function test_store_guarda_una_tarea_y_redirige_con_mensaje(): void
    {
        $response = $this->post(route('tareas.store'), [
            'titulo' => 'Preparar entrega',
            'descripcion' => 'Organizar archivos y revisar detalles finales.',
            'prioridad' => 'media',
            'fecha_limite' => now()->addDay()->format('Y-m-d'),
        ]);

        $response->assertRedirect(route('tareas.index'));
        $response->assertSessionHas('success', 'Tarea creada correctamente.');

        $this->assertDatabaseHas('tareas', [
            'titulo' => 'Preparar entrega',
            'prioridad' => 'media',
            'completada' => false,
        ]);
    }

    public function test_store_valida_que_la_fecha_limite_no_sea_pasada(): void
    {
        $response = $this->from(route('tareas.create'))->post(route('tareas.store'), [
            'titulo' => 'Tarea invalida',
            'prioridad' => 'alta',
            'fecha_limite' => now()->subDay()->format('Y-m-d'),
        ]);

        $response->assertRedirect(route('tareas.create'));
        $response->assertSessionHasErrors('fecha_limite');
    }

    public function test_toggle_cambia_el_estado_de_la_tarea(): void
    {
        $tarea = Tarea::create([
            'titulo' => 'Cambiar estado',
            'prioridad' => 'media',
            'completada' => false,
        ]);

        $response = $this->patch(route('tareas.toggle', $tarea->id));

        $response->assertRedirect(route('tareas.index'));
        $this->assertTrue($tarea->fresh()->completada);
    }
}
