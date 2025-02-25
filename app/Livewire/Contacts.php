<?php

namespace App\Livewire;

use App\Models\Contact;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Contacts extends Component
{
    use WithPagination;

    #[Url]
    public string $search = '';

    public $gender = '';

    #[Computed]
    public function contacts(): LengthAwarePaginator
    {
        return Contact::query()
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

    public function render(): View
    {
        return view('livewire.contacts')->title('Contacts');
    }
}
