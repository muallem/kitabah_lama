<?php

namespace App\Http\Livewire\Thesis;

use App\Models\Thesis;
use Livewire\Component;
use Illuminate\Support\Str;

class Detail extends Component
{

    public $detailId;
    public $title;

    public function render()
    {
        return view('livewire.thesis.detail');
    }

    protected $listeners = [
        'editDetailThesis',
        'refreshCode',
        'refreshSecretKey',
    ];

    public function store()
    {


        if ($this->detailId) {
            $validatedData = $this->validate([
                'title' => ['required'],
            ]);
            $thesisDetail = Thesis::find($this->detailId);
            $thesisDetail->title = $this->title;
            $thesisDetail->student_id = session()->get('user_id');
            $thesisDetail->save();

        } else {

            $validatedData = $this->validate([
                'title' => ['required'],
            ]);
            Thesis::create([
                'title' => $this->title,
            ]);
        }

        $this->emit('SwalSuccess', "Berhasil", 'Berhasil membuat data');
        $this->emit('onSuccessStore');
        $this->emit('refreshDatatable');
    }
    public function resetInput()
    {
        $this->detailId = '';
        $this->title = '';
    }
    public function editDetailThesis($id)
    {
        $detail = Thesis::find($id);
        if ($detail) {
            $this->detailId = $detail->id;
            $this->title = $detail->title;
        }

        $this->emit('onEditing');
    }
}
