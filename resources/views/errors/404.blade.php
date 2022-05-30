<x-app-layout>
    @section('content')
        <div class="container-fluid" style="height: 100vh; background-color: #4CD195;">
            <!-- 404 Error Text -->
            <div class="my-auto mx-auto">
                <div class="text-center">
                    <div class="error mx-auto" data-text="404">404</div>
                    <p class="lead text-gray-800 mb-5">Unauthorized action</p>
                    <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
                    <a href="{{route('dashboard')}}">&larr; Back to Dashboard</a>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
