
 
<div class="max-w-xl mx-auto p-4">
    @if (session()->has('status'))
        <div class="bg-green-200 p-2 rounded mb-2">
            {{ session('status') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" class="space-y-4">
        <div>
            <label>Name</label>
            <input type="text" wire:model="name" class="border p-2 w-full">

            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mt-2 text-gray-600">
    <strong>Live Preview:</strong> {{ $name }}
</div>

           <!-- Auther -->

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Auther</label>
                <input type="text" wire:model="auther" class="w-full border border-gray-100 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                @error('auther')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
        <div>
            <label>Description</label>
            <textarea wire:model="description" class="border p-2 w-full"></textarea>

            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
      

        {{-- <div>
            <label>
                <input type="checkbox" wire:model="is_active">
                Active
            </label>
            @error('is_active') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div> --}}

        <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded disabled:opacity-50"
                wire:loading.attr="disabled"
                wire:target="submit">
            <span wire:loading.remove wire:target="submit">Submit</span>
            <span wire:loading wire:target="submit">Submitting...</span>
        </button>
    </form>
    {{-- <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800"></h2>
            <a href="{{ url('books/') }}" 
               class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-2 rounded-md text-sm font-medium">
                book lists
            </a>
        </div> --}}
</div>

