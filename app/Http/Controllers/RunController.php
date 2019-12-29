<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Run;
class RunController extends Controller
{
    public function store() {
        $run = Run::create($this->validateRequest());
        return \redirect($run->path());
    }
    public function update(Run $run){
        $run->update($this->validateRequest());
        return \redirect($run->path());
    }
    public function destroy(Run $run){
        $run->delete();
        return \redirect('/biegi');
    }
    protected function validateRequest(){
        return \request()->validate([
            'name'=>'required',
            'description'=>'nullable',
            'distance'=>'required',
            'location_id'=>'required',
            'start_date'=>'required|date|after:tomorrow'
        ]);
    }
}
