    @if ($this->rooms && $this->rooms->count() > 0)
            <div class="flex flex-col md:flex-row w-full">
                @foreach ($this->rooms as $room)
                    <div
                        class="basis-1/3 w-full border border-gray-100 dark:border-gray-600 rounded-md pr-0 md:mx-4 mt-6">
                        <div class="flex flex-col relative">
                            <img src="{{ asset($room->image) }}" class="w-full relative z-10 max-h-80"
                                alt="{{ $room->name }}" />
                        </div>
                        <div class="flex flex-col px-4">
                            <p class="text-sm mt-3 text-gray-300 dark:text-gray-600 font-semibold">
                                {{ $room->type }}
                            </p>
                            <h1 class="text-2xl my-2 md:text-3xl font-bold text-gray-600 "><span
                                    class="text-emerald-600">{{ $room->name }}</span></h1>
                            <p class="text-sm mb-3 line-clamp-3 hover:line-clamp-none text-gray-500 ">
                                {{ $room->description }}</p>
                        </div>
                        <div class="flex flex-row py-3 px-4 border-t border-gray-100 dark:border-gray-600">
                            <div class="w-1/2 flex flex-row dark:text-gray-400"><span
                                    class="mr-1">Ksh.</span><span>{{ number_format($room->price, 2) }} Night</span>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

    @else
            <div class="flex flex-col md:flex-row w-full">
                <!-- Room 1 -->
                <div class="basis-1/3 w-full border border-gray-100 dark:border-gray-600 rounded-md pr-0 md:mr-4 mt-6">
                    <div class="flex flex-col relative">
                        <img src="https://images.unsplash.com/photo-1618773928121-c32242e63f39?q=80&w=2670&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            class="w-full relative z-10 max-h-80" alt="" />
                        <div class="absolute z-20 bg-emerald-600 uppercase px-3 py-1 top-3 right-3 text-white text-sm">
                            Wifi
                            — TV (Cable)</div>
                    </div>
                    <div class="flex flex-col px-4">
                        <p class="text-sm mt-3 text-gray-300 dark:text-gray-600 font-semibold">Saison room</p>
                        <h1 class="text-2xl my-2 md:text-3xl font-bold text-gray-600 "><span
                                class="text-emerald-600">Single</span> room</h1>
                        <p class="text-sm mb-3 line-clamp-3 hover:line-clamp-none text-gray-500 ">You have the
                            option of
                            canceling by 6 pm on the day of arrival. Dogs must be requested in advance. The max
                            lines is
                            set
                            to three and all over are invisible. Hover with your mouse or push with a finger on
                            your
                            mobile
                            device on the text to show all lines.</p>
                    </div>
                    <div class="flex flex-row py-3 px-4 border-t border-gray-100 dark:border-gray-600">
                        <div class="w-1/2 flex flex-row dark:text-gray-400"><span class="mr-1">$</span><span>89.00
                                ¬
                                Night</span></div>
                        <div class="w-1/2 text-yellow-400 text-right font-semibold">☆☆☆☆<span
                                class="text-gray-500 font-normal">☆</span></div>
                    </div>
                </div>
                <!-- Room 2 -->
                <div class="basis-1/3 w-full border border-gray-100 dark:border-gray-600 rounded-md pr-0 md:mx-4 mt-6">
                    <div class="flex flex-col relative">
                        <img src="https://images.unsplash.com/photo-1618773928121-c32242e63f39?q=80&w=2670&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            class="w-full relative z-10 max-h-80" alt="" />
                        <div class="absolute z-20 bg-emerald-600 uppercase px-3 py-1 top-3 right-3 text-white text-sm">
                            Wifi
                            — TV (Cable)</div>
                    </div>
                    <div class="flex flex-col px-4">
                        <p class="text-sm mt-3 text-gray-300 dark:text-gray-600 font-semibold">Saison room</p>
                        <h1 class="text-2xl my-2 md:text-3xl font-bold text-gray-600 "><span
                                class="text-emerald-600">Love</span> Suite</h1>
                        <p class="text-sm mb-3 line-clamp-3 hover:line-clamp-none text-gray-500 ">In this suite
                            there is
                            a
                            double bed and a bottle of sparkling wine on request at check-in. The max lines is set
                            to
                            three
                            and all over are invisible. Hover with your mouse or push with a finger on your mobile
                            device on
                            the text to show all lines.</p>
                    </div>
                    <div class="flex flex-row py-3 px-4 border-t border-gray-100 dark:border-gray-600">
                        <div class="basis-1/2 flex flex-row dark:text-gray-400"><span
                                class="mr-1">$</span><span>119.00
                                ¬
                                Night</span></div>
                        <div class="basis-1/2 text-yellow-400 text-end font-semibold">☆☆☆<span
                                class="text-gray-500 font-normal">☆☆</span></div>
                    </div>
                </div>
                <!-- Room 3 -->
                <div class="basis-1/3 w-full border border-gray-100 dark:border-gray-600 rounded-md pr-0 md:ml-4 mt-6">
                    <div class="flex flex-col relative">
                        <img src="https://images.unsplash.com/photo-1618773928121-c32242e63f39?q=80&w=2670&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            class="w-full relative z-10 max-h-80" alt="" />
                        <div class="absolute z-20 bg-emerald-600 uppercase px-3 py-1 top-3 right-3 text-white text-sm">
                            Wifi
                            — TV (Sky)</div>
                    </div>
                    <div class="flex flex-col px-4">
                        <p class="text-sm mt-3 text-gray-300 dark:text-gray-600 font-semibold">Premium room</p>
                        <h1 class="text-2xl my-2 md:text-3xl font-bold text-gray-600 "><span
                                class="text-emerald-600">Individual</span> room</h1>
                        <p class="text-sm mb-3 line-clamp-3 hover:line-clamp-none text-gray-500 ">We add up to two
                            more
                            beds. Crib possible. Breakfast must be ordered <u>separately</u>. The max lines is set
                            to
                            three
                            and all over are invisible. Hover with your mouse or push with a finger on your mobile
                            device on
                            the text to show all lines.</p>
                    </div>
                    <div class="flex flex-row py-3 px-4 border-t border-gray-100 dark:border-gray-600">
                        <div class="w-1/2 flex flex-row dark:text-gray-400"><span class="mr-1">$</span><span>149.00 ¬
                                Night</span></div>
                        <div class="w-1/2 text-yellow-400 text-end font-semibold">☆☆☆☆☆</div>
                    </div>
                </div>
            </div>
    @endif

