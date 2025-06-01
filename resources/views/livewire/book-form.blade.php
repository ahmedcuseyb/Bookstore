<html>
<head>
    <title>Book Form</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>

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

        <div>
            <label>Description</label>
            <textarea wire:model="description" class="border p-2 w-full"></textarea>

            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>
                <input type="checkbox" wire:model="is_active">
                Active
            </label>
            @error('is_active') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded disabled:opacity-50"
                wire:loading.attr="disabled"
                wire:target="submit">
            <span wire:loading.remove wire:target="submit">Submit</span>
            <span wire:loading wire:target="submit">Submitting...</span>
        </button>
    </form>
</div>

</body>
</html>
