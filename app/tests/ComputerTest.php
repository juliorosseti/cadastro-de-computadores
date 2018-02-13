<?php

use Laravel\Lumen\Testing\DatabaseTransactions;

class ComputerTest extends TestCase
{
    // Use DatabaseTransactions; // Desabilite para manter os dados na base

    /**
     * Realiza test da regra de inserção para os ADMs.
     *
     * @return void
     */
    public function testCreateAdmComputer()
    {
        $this->createComputer([
            'cpu' =>  1,
            'gpu' =>  0,
            'ram' =>  4,
            'hd'  =>  120,
        ]);
    }

    /**
     * Realiza test da regra de inserção para os DEVs.
     *
     * @return void
     */
    public function testCreateDesenvolvimentoComputer()
    {
        $this->createComputer([
            'cpu' =>  4,
            'gpu' =>  0,
            'ram' =>  8,
            'hd'  =>  120,
        ]);
    }

    /**
     * Realiza test da regra de inserção para Animação.
     *
     * @return void
     */
    public function testCreateAnimacaoComputer()
    {
        $this->createComputer([
            'cpu' =>  8,
            'gpu' =>  2,
            'ram' =>  16,
            'hd'  =>  240,
        ]);
    }

    /**
     * Realiza test da regra de inserção para o 3d.
     *
     * @return void
     */
    public function testCreate3dComputer()
    {
        $this->createComputer([
            'cpu' =>  16,
            'gpu' =>  3,
            'ram' =>  32,
            'hd'  =>  480,
        ]);
    }

    /**
     * Realiza test da regra de inserção para o Design.
     *
     * @return void
     */
    public function testCreateDesignComputer()
    {
        $this->createComputer([
            'cpu' =>  6,
            'gpu' =>  1,
            'ram' =>  8,
            'hd'  =>  240,
        ]);
    }

    /**
     * Realiza test do retorno de um dado.
     *
     * @return void
     */
    public function testViewComputer()
    {
        $computer = \App\Computer::first();

        $this->get('/api/computer/'.$computer->id);

        $this->assertResponseOk();

        $response = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('id', $response);
        $this->assertArrayHasKey('nr_serial', $response);
        $this->assertArrayHasKey('cpu', $response);
        $this->assertArrayHasKey('gpu', $response);
        $this->assertArrayHasKey('ram', $response);
        $this->assertArrayHasKey('hd', $response);
    }

    /**
     * Realiza test do retorno de todos os dados.
     *
     * @return void
     */
    public function testAllComputers()
    {
        $this->get('/api/computers/');
        $this->assertResponseOk();
        $this->seeJsonStructure([
            "*" => [
                'id', 
                'nr_serial',
                'cpu',
                'gpu',
                'ram',
                'hd'
            ]
        ]);
    }

    /**
     * Realiza test do retorno de todos os dados.
     *
     * @return void
     */
    public function testListComputersCategory()
    {
        $data = [
            'category' => '3d',
        ];

        $this->get('/api/computers/', $data);
        $this->assertResponseOk();
        $this->seeJsonStructure([
            "*" => [
                'id', 
                'nr_serial',
                'cpu',
                'gpu',
                'ram',
                'hd'
            ]
        ]);
    }

    /**
     * Realiza test de remoção de um dado.
     *
     * @return void
     */
    public function testDeleteComputer()
    {
        $computer = \App\Computer::first();
        $this->delete('/api/computer/'.$computer->id);
        $this->assertResponseOk();
        $this->assertEquals('Removido com sucesso!', $this->response->content());
    }

    /**
     * Realiza test da regra de edição
     *
     * @return void
     */
    public function testEditComputer()
    {
        $computer = \App\Computer::first();

        $data = $this->getDataComputer([
            'nr_serial' =>  'EDITED'.uniqid(),
        ]);

        $this->put('/api/computer/'.$computer->id, $data);

        $this->assertResponseOk();

        $response = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('id', $response);
    }

    /**
     * Cria novo computador
     *
     * @return void
     */
    private function createComputer($data)
    {
        $data = $this->getDataComputer($data);

        $this->post('/api/computer', $data);
        $this->assertResponseOk();

        $response = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('id', $response);
    }

    private function getDataComputer($data) 
    {
        $default = [
            'nr_serial' => 'HR'.uniqid(),
            'cpu'       => 1,
            'gpu'       => 1,
            'ram'       => 1,
            'hd'        => 1,
            'image'     => 'abc.jpg'
        ];

        return array_merge($default, $data);
    }

}
