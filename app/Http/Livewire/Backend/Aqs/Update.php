<?php

namespace App\Http\Livewire\Backend\Aqs;

use App\Models\Aqs;
use Livewire\Component;

class Update extends Component
{
    public $title;
    public $status;
    public $answer;
    public $aq;
    public $showSuccess = false;

    public function mount($aq)
    {
        $this->aq = $aq;
        $this->title = $this->aq->title;
        $this->status = $this->aq->status;
        $this->answer = $this->aq->answer;
    }

    public function render()
    {
        return view('livewire.backend.aqs.update', [
            'aq' => $this->aq,
        ]);
    }

    public function update()
    {
        $data = $this->validate([
            'title' => 'required|string|min:2|max:25|unique:aqs,title,' . $this->aq->id,
            'status' => 'required|string|in:' . implode(",", Aqs::STATUS),
            'answer' => 'required|string|min:20',
        ]);

        $this->aq->title = $data['title'];
        $this->aq->status = $data['status'];
        $this->aq->answer = $data['answer'];

        $this->showSuccess = $this->aq->save();

        return redirect()->route('aqs.index');
    }
}
