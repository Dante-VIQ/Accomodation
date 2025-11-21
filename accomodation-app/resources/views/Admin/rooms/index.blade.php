@if ($this->rooms && $this->rooms->count() > 0)
     @foreach ($this->rooms as $room)
         <div class="basis-1/3 w-full border border-gray-100 dark:border-gray-600 rounded-md pr-0 md:mx-4 mt-6">
             <div class="flex flex-col relative">
                 <img src="{{ $room->image }}" class="w-full relative z-10 max-h-80" alt="{{ $room->name }}" />
             </div>
             <div class="flex flex-col px-4">
                 <p class="text-sm mt-3 text-gray-300 dark:text-gray-600 font-semibold">{{ $room->type }}</p>
                 <h1 class="text-2xl my-2 md:text-3xl font-bold text-gray-600 "><span
                         class="text-emerald-600">{{ $room->name }}</span></h1>
                 <p class="text-sm mb-3 line-clamp-3 hover:line-clamp-none text-gray-500 ">{{ $room->description }}</p>
             </div>
             <div class="flex flex-row py-3 px-4 border-t border-gray-100 dark:border-gray-600">
                 <div class="w-1/2 flex flex-row dark:text-gray-400"><span
                         class="mr-1">$</span><span>{{ number_format($room->price, 2) }} Night</span></div>
                 {{-- <div class="w-1/2 text-right">
                     <a href="{{ route('rooms.show', $room->id) }}" class="text-blue-500 mr-2">View</a>
                     <a href="{{ route('rooms.edit', $room->id) }}" class="text-yellow-500 mr-2">Edit</a>
                     <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" style="display:inline;">
                         @csrf
                         @method('DELETE')
                         <button type="submit" class="text-red-500"
                             onclick="return confirm('Are you sure?')">Delete</button>
                     </form>
                 </div> --}}
             </div>
         </div>
     @endforeach
     @else
     <p class="text-gray-500 dark:text-gray-400">No rooms found.</p>
 @endif
