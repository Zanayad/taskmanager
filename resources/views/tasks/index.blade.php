<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Tasks
        </h2>
    </x-slot>

    <div class="py-8 max-w-4xl mx-auto px-4">

        {{-- Success Message --}}
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        {{-- Add Task Form --}}
        <div class="bg-white rounded-2xl shadow p-6 mb-8">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">➕ Tambah Task Baru</h3>
            <form method="POST" action="{{ route('tasks.store') }}">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="md:col-span-2">
                        <input type="text" name="title" placeholder="Nama task..."
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                            value="{{ old('title') }}" required>
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="md:col-span-2">
                        <textarea name="description" placeholder="Description (optional)..."
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                            rows="2">{{ old('description') }}</textarea>
                    </div>
                    <div>
                        <select name="priority"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <option value="low">🟢 Low Priority</option>
                            <option value="medium" selected>🟡 Medium Priority</option>
                            <option value="high">🔴 High Priority</option>
                        </select>
                    </div>
                    <div>
                        <input type="date" name="due_date"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                            value="{{ old('due_date') }}">
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-2 rounded-lg transition">
                        + Tambah Task
                    </button>
                </div>
            </form>
        </div>

        {{-- Task Stats --}}
        <div class="grid grid-cols-3 gap-4 mb-8">
            <div class="bg-white rounded-2xl shadow p-4 text-center">
                <p class="text-3xl font-bold text-blue-500">{{ $tasks->count() }}</p>
                <p class="text-gray-500 text-sm mt-1">Total Tasks</p>
            </div>
            <div class="bg-white rounded-2xl shadow p-4 text-center">
                <p class="text-3xl font-bold text-green-500">{{ $tasks->where('is_completed', true)->count() }}</p>
                <p class="text-gray-500 text-sm mt-1">Completed</p>
            </div>
            <div class="bg-white rounded-2xl shadow p-4 text-center">
                <p class="text-3xl font-bold text-orange-500">{{ $tasks->where('is_completed', false)->count() }}</p>
                <p class="text-gray-500 text-sm mt-1">Pending</p>
            </div>
        </div>

        {{-- Task List --}}
        <div class="space-y-3">
            @forelse($tasks as $task)
                <div class="bg-white rounded-2xl shadow p-5 flex items-start gap-4 {{ $task->is_completed ? 'opacity-60' : '' }}">

                    {{-- Toggle Complete Button --}}
                    <form method="POST" action="{{ route('tasks.toggle', $task) }}">
                        @csrf
                        @method('PATCH')
                        <button type="submit"
                            class="mt-1 w-6 h-6 rounded-full border-2 flex items-center justify-center transition
                            {{ $task->is_completed ? 'bg-green-500 border-green-500 text-white' : 'border-gray-300 hover:border-green-400' }}">
                            @if($task->is_completed) ✓ @endif
                        </button>
                    </form>

                    {{-- Task Info --}}
                    <div class="flex-1">
                        <p class="font-semibold text-gray-800 {{ $task->is_completed ? 'line-through text-gray-400' : '' }}">
                            {{ $task->title }}
                        </p>
                        @if($task->description)
                            <p class="text-gray-500 text-sm mt-1">{{ $task->description }}</p>
                        @endif
                        <div class="flex items-center gap-3 mt-2">
                            {{-- Priority Badge --}}
                            @if($task->priority === 'high')
                                <span class="text-xs bg-red-100 text-red-600 px-2 py-0.5 rounded-full">🔴 High</span>
                            @elseif($task->priority === 'medium')
                                <span class="text-xs bg-yellow-100 text-yellow-600 px-2 py-0.5 rounded-full">🟡 Medium</span>
                            @else
                                <span class="text-xs bg-green-100 text-green-600 px-2 py-0.5 rounded-full">🟢 Low</span>
                            @endif

                            {{-- Due Date --}}
                            @if($task->due_date)
                                <span class="text-xs text-gray-400">📅 {{ $task->due_date->format('d M Y') }}</span>
                            @endif
                        </div>
                    </div>

                    {{-- Delete Button --}}
                    <form method="POST" action="{{ route('tasks.destroy', $task) }}"
                        onsubmit="return confirm('Delete task ni?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-gray-300 hover:text-red-400 transition text-xl">✕</button>
                    </form>
                </div>
            @empty
                <div class="bg-white rounded-2xl shadow p-10 text-center text-gray-400">
                    <p class="text-4xl mb-3">📋</p>
                    <p>Belum ada task lagi. Tambah task pertama you!</p>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>