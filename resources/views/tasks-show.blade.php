<!DOCTYPE html>
<html>
<head>
    <title>{{ $task->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Tailwind Typography Plugin for better Markdown styling --}}
    <link rel="stylesheet" href="https://unpkg.com/@tailwindcss/typography@0.5.0/dist/typography.min.css">
</head>
<body class="bg-gray-50 p-10">
    <div class="max-w-3xl mx-auto bg-white p-10 rounded-xl shadow-lg">
        {{-- Navigation --}}
        <a href="/tasks" class="text-blue-500 hover:underline text-sm mb-8 inline-block">&larr; Back to all tasks</a>

        <header class="border-b pb-6 mb-8">
            <h1 class="text-4xl font-extrabold text-gray-900 mb-2">{{ $task->title }}</h1>
            <div class="flex gap-3">
                <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-bold uppercase">
                    Project: {{ $task->project->name }}
                </span>
                <span class="px-3 py-1 bg-amber-100 text-amber-700 rounded-full text-xs font-bold uppercase">
                    Priority: {{ $task->priority }}
                </span>
            </div>
        </header>

        {{-- The Markdown Content --}}
        <article class="prose prose-lg max-w-none">
            {!! str($task->description)->markdown() !!}
        </article>
    </div>
</body>
</html>