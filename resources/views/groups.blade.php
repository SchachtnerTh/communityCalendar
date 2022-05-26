<x-mylayout>
    <x-myheader />
        <div class="bg-gray-300 w-full flex flex-wrap p-4 items-center justify-center">
            @foreach ($groups as $group)
                <x-mybox :group="$group" />
        
            @endforeach
        </div>
</x-mylayout>