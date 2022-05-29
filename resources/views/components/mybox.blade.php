<div class="flex w-96 h-96 p-8">
    <div class="flex flex-col w-full border bg-red-300 rounded-3xl bg-clip-content overflow-hidden">
        <div class="flex bg-red-800 h-16 pl-6 items-center text-gray-100 font-bold text-xl">
            {{ $group->name }}
        </div>
        <div class="flex flex-col pl-6 my-2 h-full overflow-y-auto">
            <ul>
                @foreach ($group->clists as $clist)
                    <li>
                        <a href="/showlist/{{ $clist->slug }}">{{ $clist->name }}</a>
                    </li>
                @endforeach
<!--                <li>Altach</li>
                <li>Auburg</li>
                <li>Barbing</li>
                <li>Eltheim</li>
                <li>Friesheim</li>
                <li>Illkofen</li>
                <li>Sarching</li>
                <li>Unterheising</li>-->
            </ul>
        </div>
    </div>
</div>