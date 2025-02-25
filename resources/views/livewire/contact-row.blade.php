<tr @class([
    'hover:bg-gray-100 transition',
    'border-b'=> !$loop->last,
])>
    <td class="p-4">{{ $loop->iteration }}</td>
    <td class="p-4">{{ $contact->name }}</td>
    <td class="p-4">{{ $contact->email }}</td>
    <td class="p-4 text-center">
        <x-menu>
            <x-menu.button>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                </svg>
            </x-menu.button>

            <x-menu.items>
                <x-dialog>
                    <x-dialog.open>
                        <x-menu.close>
                            <x-menu.item>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                    <path d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z" />
                                    <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z" />
                                </svg>
                                Edit
                            </x-menu.item>
                        </x-menu.close>
                    </x-dialog.open>

                    <x-dialog.panel>
                        <form wire:submit="save" class="flex flex-col gap-4">
                            <h2 class="text-3xl font-bold mb-1">Edit your contact</h2>

                            <hr class="w-[75%]">

                            <label class="flex flex-col gap-2">
                                Name
                                <input wire:model="form.name" class="px-3 py-2 border font-normal rounded-lg border-slate-300 read-only:opacity-50 read-only:cursor-not-allowed">
                                @error('form.name')
                                    <div class="text-sm text-red-500 font-normal">{{ $message }}</div>
                                @enderror
                            </label>

                            <x-dialog.footer>
                                <x-dialog.close>
                                    <button type="button" class="text-center rounded-xl bg-slate-300 text-slate-800 px-6 py-2 font-semibold">Cancel</button>
                                </x-dialog.close>

                                <button type="submit" class="text-center rounded-xl bg-slate-600 text-white px-6 py-2 font-semibold disabled:cursor-not-allowed disabled:opacity-50">
                                    Save
                                </button>
                            </x-dialog.footer>
                        </form>
                    </x-dialog.panel>
                </x-dialog>
            </x-menu.items>
        </x-menu>
    </td>
</tr>
