<?php

namespace App\Livewire\Contacts;

use App\Models\Contact;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    #[Url]
    public string $search = '';

    public $gender = '';

    public $secondaryContact = '';

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    #[Computed]
    public function contacts(): LengthAwarePaginator
    {
        return Contact::query()
            ->where('is_merged', false)
            ->whereNull('merged_into_id')
            ->when($this->search, function (Builder $query): void {
                $query->where(function (Builder $query): void {
                    $query->where('name', 'like', "%{$this->search}%")
                        ->orWhere('email', 'like', "%{$this->search}%");
                });
            })
            ->when($this->gender, function (Builder $query): void {
                $query->where('gender', $this->gender);
            })
            ->orderBy('name')
            ->paginate(10);
    }

    public function delete(Contact $contact): void
    {
        $contact->delete();

        $this->dispatch('deleted');
    }

    public function merge(Contact $masterContact): void
    {
        $this->validate(['secondaryContact' => ['required', 'integer']]);

        $masterContact->loadMissing('customFields');

        $masterContact->merged_into_id = $this->secondaryContact;
        $masterContact->is_merged = true;
        $masterContact->save();

        $this->reset('secondaryContact');
        $this->dispatch('merged');
    }

    public function render(): View
    {
        return view('livewire.contacts.index')
            // TODO: performance Need fetch via search!
            ->with('masterContacts', Contact::query()->select('id', 'name')->orderBy('name')->get())
            ->title('Contacts');
    }
}
