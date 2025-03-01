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
                    <th class="p-4 text-left">Actions</th>
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
                        <td class="p-4">{{ $customField->type->getName() }}</td>
                        <td class="p-4 text-center">
                            <x-menu>
                                <x-menu.button>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                    </svg>
                                </x-menu.button>

                                <x-menu.items>
                                    <x-menu.close>
                                        <a
                                            wire:navigate
                                            href="{{ route('custom_fields.edit', $customField) }}"
                                        >
                                            <x-menu.item>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                                    <path d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z" />
                                                    <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z" />
                                                </svg>
                                                Edit
                                            </x-menu.item>
                                        </a>
                                    </x-menu.close>

                                    <x-dialog>
                                        <x-dialog.open>
                                            <x-menu.item>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                                    <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z" clip-rule="evenodd" />
                                                </svg>

                                                Delete
                                            </x-menu.item>
                                        </x-dialog.open>

                                        <x-dialog.panel>
                                            <div
                                                x-data="{ confirmation: '' }"
                                                x-on:deleted.window="confirmation = ''"
                                                class="flex flex-col gap-6"
                                            >
                                                <h2 class="font-semibold text-3xl">Are you sure you?</h2>
                                                <h2 class="text-lg text-slate-700">This operation is permanant and cannot be reversed. This contact will be deleted forever.</h2>

                                                <label class="flex flex-col gap-2">
                                                    Type "CONFIRM"
                                                    <input
                                                        x-model="confirmation"
                                                        class="px-3 py-2 border border-slate-300 rounded-lg"
                                                        placeholder="CONFIRM"
                                                        x-on:keyup.enter="$dialog.close(); $wire.delete({{ $customField->id }})"
                                                    >
                                                </label>

                                                <x-dialog.footer>
                                                    <x-dialog.close>
                                                        <button
                                                            type="button"
                                                            class="text-center rounded-xl bg-slate-300 text-slate-800 px-6 py-2 font-semibold"
                                                        >
                                                            Cancel
                                                        </button>
                                                    </x-dialog.close>

                                                    <x-dialog.close>
                                                        <button
                                                            :disabled="confirmation !== 'CONFIRM'"
                                                            wire:click="delete({{ $customField->id }})"
                                                            type="button"
                                                            class="text-center rounded-xl bg-red-500 text-white px-6 py-2 font-semibold disabled:cursor-not-allowed disabled:opacity-50"
                                                        >
                                                            Delete
                                                        </button>
                                                    </x-dialog.close>
                                                </x-dialog.footer>
                                            </div>
                                        </x-dialog.panel>
                                    </x-dialog>
                                </x-menu.items>
                            </x-menu>
                        </td>
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
