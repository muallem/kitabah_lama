<?php

namespace App\Http\Livewire\AdminThesis;

use App\Models\Thesis;
use Livewire\Component;
use Illuminate\Support\Str;

class Detail extends Component
{

    public $detailId;
    public $title;
    public $group;

    public function render()
    {
        return view('livewire.admin-thesis.detail');
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
                'group' => ['required'],
            ]);
            $thesisDetail = Thesis::find($this->detailId);
            $thesisDetail->group = $this->group;
            $thesisDetail->teacher_id = session()->get('user_id');
            $thesisDetail->save();

        } 

        $this->emit('SwalSuccess', "Berhasil", 'Berhasil membuat data');
        $this->emit('onSuccessStore');
        $this->emit('refreshDatatable');
    }
    public function resetInput()
    {
        $this->detailId = '';
        $this->group = '';
    }
    public function editDetailThesis($id)
    {
        $detail = Thesis::find($id);
        if ($detail) {
            $this->detailId = $detail->id;
            $this->title = $detail->title;
            $this->group = $detail->group;
        }
        $this->emit('onEditing');
    }
}
