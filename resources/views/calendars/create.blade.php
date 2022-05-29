<x-mylayout>
    <x-myheader />
        <div class="w-full max-w-2xl mx-auto">
            <div class="text-gray-800 m-16 text-2xl font-bold flex items-center justify-center">
                <h1>
                    Neuen Kalender anlegen
                </h1>
            </div>
            <div class="text-gray-800 m-16">
                <form method="POST" action="/admin/calendars">
                    @csrf

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" 
                            for='calName'
                        >
                            Name des Kalenders
                        </label>
                    
                        <input class="border border-gray-400 p-2 w-full" 
                            type="text" 
                            placeholder="Mein Verein" 
                            name='calName' 
                            width='500rem'
                            height="200"
                            id='calName' 
                            required
                        />

                        @error('calName')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>                        
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" 
                            for='calUrl'
                        >
                            Adresse des Kalenders
                        </label>
                    
                        <input class="border border-gray-400 p-2 w-full" 
                            type="url" 
                            placeholder="https://www.mein-kalender.de" 
                            name='calUrl' 
                            id='calUrl' 
                            required
                        />

                        @error('calUrl')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>                        
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" 
                            for='listMemberships'
                        >
                            Listenmitgliedschaften
                        </label>
                    
                        <select multiple class="border border-gray-400 p-2 w-full" 
                            name='listMemberships[]' 
                            id='listMemberships' 
                        >
                            @foreach ($clists as $clist)
                                <option value="{{ $clist->id }}">{{ $clist->name }}</option>
                            @endforeach
                        </select>

                        @error('listMemberships')
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