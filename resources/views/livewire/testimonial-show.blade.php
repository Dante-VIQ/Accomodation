<div 
    x-data="testimonialSlider()"
    x-init="start()"
    class="overflow-hidden w-full max-w-7xl mx-auto py-12"
>
    <div 
        class="flex transition-transform duration-700"
        :style="`transform: translateX(-${current * width}px)`"
    >
        @foreach ($testimonials as $item)
        <div class="p-4 flex-shrink-0 w-full md:w-1/3">
            <div class="bg-white rounded-lg p-6 shadow text-center flex flex-col items-center">
                <img 
                    src="{{ $item->avatar ? asset('storage/' . $item->avatar) : asset('images/person_2.jpg') }}" 
                    class="w-20 h-20 rounded-full mb-4 object-cover"
                />
                <p class="text-gray-700 italic mb-4">{{ $item->message }}</p>
                <div class="font-bold">{{ $item->name }}</div>
                <span class="text-sm text-gray-500">{{ $item->role }}</span>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
function testimonialSlider() {
    return {
        current: 0,
        width: 0,

        start() {
            this.update();

            window.addEventListener('resize', () => this.update());

            setInterval(() => {
                const visible = window.innerWidth >= 768 ? 3 : 1;
                const max = {{ $testimonials->count() }} - visible;

                this.current = this.current >= max ? 0 : this.current + 1;
            }, 3000);
        },

        update() {
            const wrapper = document.querySelector('[x-data]');
            this.width = window.innerWidth >= 768
                ? wrapper.clientWidth / 3
                : wrapper.clientWidth;
        }
    }
}
</script>
