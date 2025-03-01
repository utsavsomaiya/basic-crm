<div class="w-full max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold">Custom fields</h2>
        <a
            wire:navigate
            href="{{ route('custom_fields.create') }}"
            class="px-4 py-2 bg-slate-300 text-black rounded-lg hover:bg-slate-500 hover:text-white"
        >
            + Add Custom field
        </a>
    </div>

    <div class="overflow-x-auto rounded-lg shadow">
        <table class="w-full border-collapse bg-white">
            <thead>
                <tr class="bg-gradient-to-r from-slate-500 to-slate-300 text-black">
                    <th class="p-4 text-left">#</th>
                    <th class="p-4 text-left">Name</th>
                    <th class="p-4 text-left">Type</th>
                    <th class="p-4 text-center">Actions</th>
                </tr>
            </thead>
            <tbody wire:loading.class="opacity-50">
                @forelse ($customFields as $customField)
                    <tr @class([
                        'hover:bg-gray-100 transition',
                        'border-b'=> !$loop->last,
                    ])>
                        <td class="p-4">{{ $loop->iteration }}</td>
                        <td class="p-4">{{ $customField->name }}</td>
                        <td class="p-4">{{ $customField->type }}</td>
                    </tr>
                @empty
                    <tr>
                        <td class="p-4 text-center" colspan="4">
                            No custom fields found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
