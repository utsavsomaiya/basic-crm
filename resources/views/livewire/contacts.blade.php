@use('App\Enums\Gender')

<div class="w-full max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
    <div class="mb-4 flex items-center border rounded-lg overflow-hidden">
        <input
            wire:model.live="search"
            type="text"
            placeholder="Search..."
            class="w-full p-3 text-gray-700 focus:outline-none"
        >
        <select
            wire:model.live="gender"
            class="p-3 border-l text-gray-700 focus:outline-none appearance-none bg-transparent"
        >
            <option value="">Select Gender</option>
            @foreach (Gender::getOptions() as $value => $label)
                <option value="{{ $value }}">{{ $label }}</option>
            @endforeach
        </select>
    </div>

    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold">Contacts</h2>
        <button
            type="button"
            wire:click="createContact"
            class="px-4 py-2 bg-slate-300 text-black rounded-lg hover:bg-slate-500 hover:text-white"
        >
            + Add Contact
        </button>
    </div>


    <div class="overflow-x-auto rounded-lg shadow">
        <table class="w-full border-collapse bg-white">
            <thead>
                <tr class="bg-gradient-to-r from-slate-500 to-slate-300 text-black">
                    <th class="p-4 text-left">#</th>
                    <th class="p-4 text-left">Name</th>
                    <th class="p-4 text-left">Email</th>
                    <th class="p-4 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($this->contacts as $contact)
                    <livewire:contact-row
                        :key="$contact->id"
                        :$loop
                        :$contact
                    />
                @empty
                    <tr>
                        <td class="p-4 text-center" colspan="4">
                            No contacts found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
