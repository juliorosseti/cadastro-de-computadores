<?php

namespace App\Http\Controllers;

use App\Computer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ComputerController extends Controller
{
    public function __construct()
    {
        //
    }

    public function add(Request $request) 
    {
        $this->validate($request, [
            'nr_serial' => 'required|unique:computers|max:255',
            'cpu'       => 'required',
            'gpu'       => 'required',
            'hd'        => 'required',
            'ram'       => 'required'
        ]);

        $computer = new Computer($request->all());
        $computer->category = $this->getCategory($request->all());
        $computer->save();

        return $computer;
    }

    public function edit(Request $request, $id) 
    {
        $this->validate($request, [
            'nr_serial' => 'required|unique:computers|max:255',
            'cpu'       => 'required',
            'gpu'       => 'required',
            'hd'        => 'required',
            'ram'       => 'required'
        ]);

        $computer = Computer::find($id);

        $computer->nr_serial = $request->input('nr_serial');
        $computer->cpu       = $request->input('cpu');
        $computer->gpu       = $request->input('gpu');
        $computer->hd        = $request->input('hd');
        $computer->ram       = $request->input('ram');
        $computer->category  = $this->getCategory($request->all());
        $computer->update();

        return $computer;
    }

    public function view($id) 
    {
        return Computer::find($id);
    }

    public function delete($id) 
    {
        if (Computer::destroy($id)) {
            return new Response('Removido com sucesso!', 200);
        } else {
            return new Response('Não foi possível remover!', 401);
        }
    }

    public function list(Request $request) 
    {
        $category = $request->input('category');

        if (!empty($category)) {
            return Computer::where('category', $category)
               ->orderBy('nr_serial', 'asc')
               ->take(10)
               ->get();
        } else {
            return Computer::all();
        }
        
    }

    private function getCategory($data) {

        if ($this->categoryIs3d($data))
            return '3d';

        if ($this->categoryIsAnimacao($data))
            return 'animacao';

        if ($this->categoryIsDesign($data))
            return 'design';

        if ($this->categoryIsDesenvolvimento($data))
            return 'desenvolvimento';

        return 'adm';
    }

    private function categoryIsAnimacao($data) {

        $totalCpu = 8;
        $totalGpu = 2;
        $totalRam = 16;
        $totalHd  = 240;

        return (
            ($data['cpu'] >= $totalCpu) AND
            ($data['gpu'] >= $totalGpu) AND
            ($data['hd'] >= $totalHd) AND
            ($data['ram'] >= $totalRam)
        );
    }

    private function categoryIs3d($data) {

        $totalCpu = 16;
        $totalGpu = 3;
        $totalRam = 32;
        $totalHd  = 480;

        return (
            ($data['cpu'] >= $totalCpu) AND
            ($data['gpu'] >= $totalGpu) AND
            ($data['hd'] >= $totalHd) AND
            ($data['ram'] >= $totalRam)
        );
    }

    private function categoryIsDesenvolvimento($data) {

        $totalCpu = 4;
        $totalGpu = 0;
        $totalRam = 8;
        $totalHd  = 120;

        return (
            ($data['cpu'] >= $totalCpu) AND
            ($data['gpu'] >= $totalGpu) AND
            ($data['hd'] >= $totalHd) AND
            ($data['ram'] >= $totalRam)
        );
    }

    private function categoryIsDesign($data) {

        $totalCpu = 6;
        $totalGpu = 1;
        $totalRam = 8;
        $totalHd  = 240;

        return (
            ($data['cpu'] >= $totalCpu) AND
            ($data['gpu'] >= $totalGpu) AND
            ($data['hd'] >= $totalHd) AND
            ($data['ram'] >= $totalRam)
        );
    }
}
