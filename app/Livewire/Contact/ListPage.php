<?php

namespace App\Livewire\Contact;

use App\Models\Contact;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ListPage extends Component
{
    use WithPagination;

    #[Url]
    public string $search = '';

    #[Computed]
    public function contacts()
    {
        return Contact::query()
            ->where('name', 'like', "%{$this->search}%")
            ->orderBy('name')
            ->paginate(10);
    }

    public function render(): View
    {
        return view('livewire.contact.list-page')
            ->title('Contacts');
    }
}
