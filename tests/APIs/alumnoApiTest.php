<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\alumno;

class alumnoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_alumno()
    {
        $alumno = factory(alumno::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/alumnos', $alumno
        );

        $this->assertApiResponse($alumno);
    }

    /**
     * @test
     */
    public function test_read_alumno()
    {
        $alumno = factory(alumno::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/alumnos/'.$alumno->id
        );

        $this->assertApiResponse($alumno->toArray());
    }

    /**
     * @test
     */
    public function test_update_alumno()
    {
        $alumno = factory(alumno::class)->create();
        $editedalumno = factory(alumno::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/alumnos/'.$alumno->id,
            $editedalumno
        );

        $this->assertApiResponse($editedalumno);
    }

    /**
     * @test
     */
    public function test_delete_alumno()
    {
        $alumno = factory(alumno::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/alumnos/'.$alumno->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/alumnos/'.$alumno->id
        );

        $this->response->assertStatus(404);
    }
}
