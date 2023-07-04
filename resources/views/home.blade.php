@php
    /** @var Illuminate\Pagination\LengthAwarePaginator */
@endphp
<x-app-layout meta-description="Fan personal Blog">

    <div class="container max-w-3xl mx-auto py-6">
    
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Latest Post -->
            <div class="col-span-2">
                <h2 class="text-lg sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 mb-3">
                    Latest Post
                </h2>

                <x-post-item :post="$latestPost" />
            </div>

            <!-- Popular 3 Post -->
            <div>
                <h2 class="text-lg sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 mb-3">
                    Popular 3 Post
                </h2>

                @foreach($popularPosts as $post)
                    <div class="grid grid-cols-4 gap-2 mb-4">
                        <a href="{{route('view', $post)}}" class="pt-1">
                            <img src="{{$post->getThumbnail()}}" alt="{{$post->title}}"/>
                        </a>
                        <div class="col-span-3">
                            <a href="{{route('view', $post)}}">
                                <h3 class="text-sm uppercase whitespace-nowrap truncate">{{$post->title}}</h3>
                            </a>
                            <div class="flex gap-4 mb-2">
                                @foreach($post->categories as $category)
                                    <a href="#" class="bg-blue-500 text-white p-1 rounded text-xs font-bold uppercase">
                                        {{$category->title}}
                                    </a>
                                @endforeach
                            </div>
                            <div class="text-xs">
                                {{$post->shortBody(10)}}
                            </div>
                            <a href="{{route('view', $post)}}" class="text-xs uppercase text-gray-800 hover:text-black">Continue
                                Reading <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Recomended Post -->
        <div class="mb-8">
            <h2 class="text-lg sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 mb-3">
                Recomended Post
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                @foreach($recommendedPosts as $post)
                    <x-post-item :post="$post" :show-author="false"/>
                @endforeach
            </div>
        </div>

        <!-- Latest Categories -->
        <div>
            @foreach($categories as $category)
                <div>
                    <h2 class="text-lg sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 mb-3">
                        Category "{{$category->title}}"
                        <a href="{{route('by-category', $category)}}">
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </h2>

                    <div class="mb-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                            @foreach($category->publishedPosts()->limit(3)->get() as $post)
                                <x-post-item :post="$post" :show-author="false"/>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    {{-- <!-- Posts Section -->
    <section class="w-full md:w-2/3 flex flex-col items-center px-3">

        @foreach($posts as $post)
            <x-post-item :post="$post"></x-post-item>
        @endforeach

        <!-- Pagination -->
        {{$posts->onEachSide(1)->links()}}

    </section>

    <!-- Sidebar Section -->
    <x-sidebar /> --}}

</x-app-layout>