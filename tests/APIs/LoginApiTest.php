<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Login;

class LoginApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_login()
    {
        $login = factory(Login::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/logins', $login
        );

        $this->assertApiResponse($login);
    }

    /**
     * @test
     */
    public function test_read_login()
    {
        $login = factory(Login::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/logins/'.$login->id
        );

        $this->assertApiResponse($login->toArray());
    }

    /**
     * @test
     */
    public function test_update_login()
    {
        $login = factory(Login::class)->create();
        $editedLogin = factory(Login::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/logins/'.$login->id,
            $editedLogin
        );

        $this->assertApiResponse($editedLogin);
    }

    /**
     * @test
     */
    public function test_delete_login()
    {
        $login = factory(Login::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/logins/'.$login->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/logins/'.$login->id
        );

        $this->response->assertStatus(404);
    }
}
