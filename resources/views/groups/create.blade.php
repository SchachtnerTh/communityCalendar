<x-mylayout>
    <x-myheader />
        <div class="w-full max-w-2xl mx-auto">
            <div class="text-gray-800 m-16 text-2xl font-bold flex items-center justify-center">
                <h1>
                    Neue Anzeigegruppe anlegen
                </h1>
            </div>
            <div class="text-gray-800 m-16">
                <form method="POST" action="/admin/groups">
                    @csrf

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" 
                            for='groupName'
                        >
                            Name der Gruppe
                        </label>
                    
                        <input class="border border-gray-400 p-2 w-full" 
                            type="text" 
                            placeholder="Gruppe 1" 
                            name='groupName' 
                            width='500rem'
                            height="200"
                            id='groupName' 
                            required
                        />

                        @error('groupName')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>                        
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" 
                            for='clistMemberships'
                        >
                            Anzuzeigende Listen in dieser Gruppe
                        </label>
                    
                        <select multiple class="border border-gray-400 p-2 w-full" 
                            name='clistMemberships[]' 
                            id='clistMemberships' 
                        >
                            @foreach ($clists as $clist)
                                <option value="{{ $clist->id }}">{{ $clist->name }}</option>
                            @endforeach
                        </select>

                        @error('clistMemberships')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>                        
                        @enderror
                    </div>

                    <div class="mb-6 items-center justify-center flex">
                        <input class="bg-red-800 rounded px-4 py-2 text-gray-200"
                            type="submit" 
                            value="Anlegen" 
                        />
                    </div>

                </form>
            </div>
        </div>
</x-mylayout>