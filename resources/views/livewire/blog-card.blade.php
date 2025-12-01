<div>
    @if ($this->blogs && $this->blogs->count() > 0)
        <div class="grid md:grid-cols-3 gap-8">
            @foreach ($blogs as $blog)
                <div class="bg-gray-100 rounded-lg p-6 shadow mb-8">
                    <div class="w-full h-48 bg-cover bg-center rounded mb-4"
                        style="background-image: url('{{ asset($blog->image) }}');">
                    </div>
                    <h3 class="text-xl font-bold mb-2">{{ $blog->title }}</h3>
                    <div class="text-sm text-gray-500 mb-2 flex gap-2 justify-center">
                        <span>{{ $blog->created_at->diffForHumans() }}</span>
                        <span>{{ $blog->author }}</span>
                        <span><span class="fa fa-comment"></span> {{ $blog->comments_count }}</span>
                    </div>
                    <p class="overflow-hidden text-wrap">{!! Str::limit(strip_tags($blog->body), 150) !!}</p>

                    <a href="{{ route('blog-single', $blog) }}" class="mt-4 mr-4 text-gray-700 bg-opacity-50">Read more</a>
                </div>
            @endforeach
        </div>
    @else
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-gray-100 rounded-lg p-6 shadow">
                <div class="w-full h-48 bg-cover bg-center rounded mb-4"
                    style="background-image: url('images/image_1.jpg');">
                </div>
                <h3 class="text-xl font-bold mb-2">Work Hard, Party Hard in a Luxury Chalet in the Alps</h3>
                <div class="text-sm text-gray-500 mb-2 flex gap-2 justify-center">
                    <span>January 30, 2020</span>
                    <span>Admin</span>
                    <span><span class="fa fa-comment"></span> 3</span>
                </div>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
            </div>
            <div class="bg-gray-100 rounded-lg p-6 shadow">
                <div class="w-full h-48 bg-cover bg-center rounded mb-4"
                    style="background-image: url('images/image_2.jpg');">
                </div>
                <h3 class="text-xl font-bold mb-2">Work Hard, Party Hard in a Luxury Chalet in the Alps</h3>
                <div class="text-sm text-gray-500 mb-2 flex gap-2 justify-center">
                    <span>January 30, 2020</span>
                    <span>Admin</span>
                    <span><span class="fa fa-comment"></span> 3</span>
                </div>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
            </div>
            <div class="bg-gray-100 rounded-lg p-6 shadow">
                <div class="w-full h-48 bg-cover bg-center rounded mb-4"
                    style="background-image: url('images/image_3.jpg');"></div>
                <h3 class="text-xl font-bold mb-2">Work Hard, Party Hard in a Luxury Chalet in the Alps</h3>
                <div class="text-sm text-gray-500 mb-2 flex gap-2 justify-center">
                    <span>January 30, 2020</span>
                    <span>Admin</span>
                    <span><span class="fa fa-comment"></span> 3</span>
                </div>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
            </div>
        </div>
    @endif
</div>
