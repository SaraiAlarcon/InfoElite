<?php namespace Tests\Repositories;

use App\Models\alumno;
use App\Repositories\alumnoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class alumnoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var alumnoRepository
     */
    protected $alumnoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->alumnoRepo = \App::make(alumnoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_alumno()
    {
        $alumno = factory(alumno::class)->make()->toArray();

        $createdalumno = $this->alumnoRepo->create($alumno);

        $createdalumno = $createdalumno->toArray();
        $this->assertArrayHasKey('id', $createdalumno);
        $this->assertNotNull($createdalumno['id'], 'Created alumno must have id specified');
        $this->assertNotNull(alumno::find($createdalumno['id']), 'alumno with given id must be in DB');
        $this->assertModelData($alumno, $createdalumno);
    }

    /**
     * @test read
     */
    public function test_read_alumno()
    {
        $alumno = factory(alumno::class)->create();

        $dbalumno = $this->alumnoRepo->find($alumno->id);

        $dbalumno = $dbalumno->toArray();
        $this->assertModelData($alumno->toArray(), $dbalumno);
    }

    /**
     * @test update
     */
    public function test_update_alumno()
    {
        $alumno = factory(alumno::class)->create();
        $fakealumno = factory(alumno::class)->make()->toArray();

        $updatedalumno = $this->alumnoRepo->update($fakealumno, $alumno->id);

        $this->assertModelData($fakealumno, $updatedalumno->toArray());
        $dbalumno = $this->alumnoRepo->find($alumno->id);
        $this->assertModelData($fakealumno, $dbalumno->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_alumno()
    {
        $alumno = factory(alumno::class)->create();

        $resp = $this->alumnoRepo->delete($alumno->id);

        $this->assertTrue($resp);
        $this->assertNull(alumno::find($alumno->id), 'alumno should not exist in DB');
    }
}
