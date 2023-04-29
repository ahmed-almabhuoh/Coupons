<?php

namespace App\Http\Livewire\Backend\Aqs;

use App\Models\Aqs;
use Livewire\Component;

class Create extends Component
{
    public $title;
    public $status;
    public $answer;
    public $showSuccess = false;

    public function render()
    {
        return view('livewire.backend.aqs.create');
    }

    public function store()
    {
        if (!auth()->user()->can('create-A&Q')) {
            abort(403);
        }
        $data = $this->validate([
            'title' => 'required|string|min:2|max:25|unique:aqs,title',
            'status' => 'required|string|in:' . implode(",", Aqs::STATUS),
            'answer' => 'required|string|min:20',
        ]);

        $aqs = new Aqs();
        $aqs->title = $data['title'];
        $aqs->status = $data['status'];
        $aqs->answer = $data['answer'];

        $this->showSuccess = $aqs->save();

        if ($this->showSuccess) {
            $this->resetModels();
        }
    }


    // Reset models
    protected function resetModels()
    {
        $this->title = '';
        $this->status = '';
        $this->answer = '';
    }
}
