<div class="w-full max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
    <div class="mb-4 flex items-center border rounded-lg overflow-hidden">
        <input
            wire:model.live="search"
            type="text"
            placeholder="Search..."
            class="w-full p-3 text-gray-700 focus:outline-none"
        >
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
                    <tr class="border-b hover:bg-gray-100 transition">
                        <td class="p-4">1</td>
                        <td class="p-4">John Doe</td>
                        <td class="p-4">john@example.com</td>
                        <td class="p-4 text-center">
                            <button class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                                Edit
                            </button>
                            <button class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 transition">
                                Delete
                            </button>
                        </td>
                    </tr>
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
