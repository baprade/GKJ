<?php

namespace App\Livewire\Forms\Cms;

use App\Models\Person;
// use Livewire\Attributes\Rule;
use Livewire\Form;

class PersonForm extends Form
{
    public ?Person $person;

    public $id = 0;

    public $sidi;

    public $nikah_by;

    public $nikah_date;

    public $passed_date;

    public $parrent;

    public $spouse;

    public $nia = 0;

    public $from;

    public $to;

    public $note;

    public function setPerson(Person $person)
    {
        $this->person = $person;
        $this->id = $person->id;
        $this->sidi = $person->sidi;
        $this->nikah_by = $person->nikah_by;
        $this->nikah_date = $person->nikah_date;
        $this->passed_date = $person->passed_date;
        $this->parrent = $person->parrent;
        $this->spouse = $person->spouse;
        $this->nia = $person->nia;
        $this->from = $person->from;
        $this->to = $person->to;
        $this->note = $person->note;
    }

    public function update()
    {
        // $this->validate();

        $updatePerson = [
            'sidi' => $this->sidi,
            'nikah_by' => $this->nikah_by,
            'nikah_date' => $this->nikah_date,
            'passed_date' => $this->passed_date,
            'parrent' => $this->parrent,
            'spouse' => $this->spouse,
            'nia' => $this->nia,
            'from' => $this->from,
            'to' => $this->to,
            'note' => $this->note,
        ];
        Person::findOrFail($this->id)->update($updatePerson);
    }

    public function store()
    {
        // $this->validate();

        $createPerson = [
            'sidi' => $this->sidi,
            'nikah_by' => $this->nikah_by,
            'nikah_date' => $this->nikah_date,
            'passed_date' => $this->passed_date,
            'parrent' => $this->parrent,
            'spouse' => $this->spouse,
            'nia' => $this->nia,
            'from' => $this->from,
            'to' => $this->to,
            'note' => $this->note,
        ];
        Person::create($createPerson);
    }
}
