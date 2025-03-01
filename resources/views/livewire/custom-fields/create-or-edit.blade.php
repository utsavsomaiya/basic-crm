@use('App\Enums\CustomFieldType')

<div class="w-full max-w-xl mx-auto p-8 bg-white shadow-xl rounded-2xl">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Create custom field</h2>
    <form wire:submit="createOrUpdate">
        <div class="grid grid-cols-1 gap-8">
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
                    <label class="block text-gray-700 font-medium mb-1">Name</label>
                    <select
                        wire:model="form.type"
                        class="w-full p-3 border rounded-xl appearance-none focus:outline-none focus:ring-3 focus:ring-slate-300"
                        x-bind:class="($wire.form.type === null || $wire.form.type === '') && 'opacity-50'"
                    >
                        <option value="">Select type</option>
                        <option value="{{ CustomFieldType::TEXT->value }}">{{ CustomFieldType::TEXT->getName() }}</option>
                        <option value="{{ CustomFieldType::DATE->value }}">{{ CustomFieldType::DATE->getName() }}</option>
                        <option value="{{ CustomFieldType::TEXTAREA->value }}">{{ CustomFieldType::TEXTAREA->getName() }}</option>
                    </select>
                    @error('form.type')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
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
