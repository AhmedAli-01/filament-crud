<!DOCTYPE html>
<html>
<head>
    {{-- CORRECT: Use a static title or count the plural collection --}}
    <title>Public Task List ({{ $tasks->count() }})</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Completed Tasks</h1>
        
        <div class="grid gap-4">
            @foreach($tasks as $task)
                {{-- INSIDE HERE: $task is defined and safe to use --}}
                <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-green-500">
                    <div class="flex justify-between items-start">
                        <h2 class="text-xl font-bold hover:text-blue-600 transition">
                            <a href="/tasks/{{ $task->slug }}">
                                {{ $task->title }}
                            </a>
                        </h2>
                        <span class="text-xs font-bold uppercase px-2 py-1 bg-gray-200 rounded">
                            {{ $task->project->name }}
                        </span>
                    </div>
                    
                    <div class="mt-4 text-gray-600">
                        {{-- Truncate the description so the list stays neat --}}
                        {{ str($task->description)->limit(150) }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>