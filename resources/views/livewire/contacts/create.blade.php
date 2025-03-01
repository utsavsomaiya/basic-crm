@use('App\Enums\CustomFieldType')
@use('App\Enums\Gender')

<div class="w-full max-w-5xl mx-auto p-8 bg-white shadow-xl rounded-2xl">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Create Contact</h2>

    <form wire:submit="create">
        <div @class([
            'grid grid-cols-1 gap-8',
            'md:grid-cols-2' => $customFields->isNotEmpty(),
            'md:grid-cols-1' => $customFields->isEmpty(),
        ])>
            <div class="space-y-6">
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Name</label>
                    <input
                        type="text"
                        wire:model="form.name"
                        class="w-full p-3 border rounded-xl focus:outline-none focus:ring-3 focus:ring-slate-300"
                        placeholder="Enter name"
                    >
                    @error('form.name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Email</label>
                    <input
                        type="email"
                        wire:model="form.email"
                        class="w-full p-3 border rounded-xl focus:outline-none focus:ring-3 focus:ring-slate-300"
                        placeholder="Enter email"
                    >
                    @error('form.email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Phone Number</label>
                    <input
                        type="text"
                        wire:model="form.phone"
                        class="w-full p-3 border rounded-xl focus:outline-none focus:ring-3 focus:ring-slate-300"
                        placeholder="Enter phone number"
                    >
                    @error('form.phone')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">Gender</label>
                    <div class="flex gap-4">
                        @foreach (Gender::getOptions() as $value => $label)
                            <label class="flex items-center cursor-pointer">
                                <input
                                    type="radio"
                                    wire:model="form.gender"
                                    value="{{ $value }}"
                                    class="hidden"
                                >
                                <div class="w-5 h-5 border-2 border-gray-400 rounded-full flex items-center justify-center mr-2">
                                    <div
                                        class="w-3 h-3 bg-slate-500 rounded-full opacity-0 transition-opacity duration-300"
                                        :class="$wire.form.gender == @js($value) && 'opacity-100'"
                                    ></div>
                                </div>
                                {{ $label }}
                            </label>
                        @endforeach
                    </div>
                    @error('form.gender')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Profile Photo</label>
                    <input
                        type="file"
                        wire:model="profile_image"
                        class="w-full p-2 border rounded-xl bg-gray-100 cursor-pointer"
                    >
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Additional File</label>
                    <input
                        type="file"
                        wire:model="additional_file"
                        class="w-full p-2 border rounded-xl bg-gray-100 cursor-pointer"
                    >
                </div>
            </div>

            <div class="space-y-6">
                @foreach ($customFields as $customField)
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">{{ $customField->name }}</label>
                        @if ($customField->type === CustomFieldType::TEXT)
                            <input
                                wire:model="form.custom_fields.{{ $customField->id }}"
                                type="text"
                                class="w-full p-3 border rounded-xl focus:outline-none focus:ring-3 focus:ring-slate-300"
                                placeholder="{{ 'Enter ' . str($customField->name)->lower() }}"
                            >
                        @elseif ($customField->type === CustomFieldType::DATE)
                            <input
                                wire:model="form.custom_fields.{{ $customField->id }}"
                                type="date"
                                class="w-full p-3 border rounded-xl focus:outline-none focus:ring-3 focus:ring-slate-300"
                            >
                        @elseif ($customField->type === CustomFieldType::TEXTAREA)
                            <textarea
                                wire:model="form.custom_fields.{{ $customField->id }}"
                                class="w-full p-3 border rounded-xl focus:outline-none focus:ring-3 focus:ring-slate-300"
                                placeholder="{{ 'Enter ' . str($customField->name)->lower() }}"
                                rows="4"
                            ></textarea>
                        @else
                            Sorry other types we cannot support for now!
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-8">
            <button
                type="submit"
                class="w-full p-3 bg-blue-600 text-white font-semibold rounded-xl hover:bg-blue-700 transition-all"
            >
                Submit
            </button>
        </div>
    </form>
</div>
