@if (session('message'))
    <div class="mb-4 border bg-green-100 border-green-500 border-2 rounded-lg pl-6 py-2">
        <div class="font-medium text-green-600">
            {{ __('Success') }}
        </div>

        <ul class="mt-3 list-disc list-inside text-sm text-green-600">
            {{ session('message') }}
        </ul>
    </div>
@endif
