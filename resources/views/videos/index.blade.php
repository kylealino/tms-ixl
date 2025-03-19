<x-app-layout>
    <style>
        #my-video {
    position: relative;
    z-index: 1; /* Adjust if necessary */
}

    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('product.create') }}">Video player</a>
        </h2>
    </x-slot>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class="pt-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10">
                <div class="container">
                    <!-- Video.js Player -->
                    <video id="my-video" class="video-js vjs-default-skin" preload="auto" autoplay width="600" height="400">
                        <source src="https://www.learningcontainer.com/wp-content/uploads/2020/05/sample-mp4-file.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
    </div>

    <!-- Video.js JS -->
    <script src="https://vjs.zencdn.net/7.14.3/video.min.js"></script>
    <script>
        var player = videojs('my-video');
    </script>
</x-app-layout>
