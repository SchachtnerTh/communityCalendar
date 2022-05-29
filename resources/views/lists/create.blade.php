<x-mylayout>
    <x-myheader />
        <div class="w-full max-w-2xl mx-auto">
            <div class="text-gray-800 m-16 text-2xl font-bold flex items-center justify-center">
                <h1>
                    Neue Kalenderliste anlegen
                </h1>
            </div>
            <div class="text-gray-800 m-16">
                <form method="POST" action="/admin/lists">
                    @csrf

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" 
                            for='clistName'
                        >
                            Name der Liste
                        </label>
                    
                        <input class="border border-gray-400 p-2 w-full" 
                            type="text" 
                            placeholder="Vereine" 
                            name='clistName' 
                            width='500rem'
                            height="200"
                            id='clistName' 
                            required
                        />

                        @error('clistName')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>                        
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" 
                            for='calMemberships'
                        >
                            Kalender in dieser Liste
                        </label>
                    
                        <select multiple class="border border-gray-400 p-2 w-full" 
                            name='calMemberships[]' 
                            id='calMemberships' 
                        >
                            @foreach ($calendars as $calendar)
                                <option value="{{ $calendar->id }}">{{ $calendar->calname }}</option>
                            @endforeach
                        </select>

                        @error('calMemberships')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>                        
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" 
                            for='groupMemberships'
                        >
                            Anzeigegruppen, in denen die Liste erscheinen soll
                        </label>
                    
                        <select multiple class="border border-gray-400 p-2 w-full" 
                            name='groupMemberships[]' 
                            id='groupMemberships' 
                        >
                            @foreach ($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                        </select>

                        @error('groupMemberships')
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