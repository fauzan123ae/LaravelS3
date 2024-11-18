<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Task
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <h1 class="text-2xl font-bold mb-4">Daftar Task</h1>
                <a href="{{ route('tasks.create') }}" class="px-4 py-2 bg-green-500 text-black rounded-md hover:bg-green-600">
                    Tambah Task
                </a>
            </div>

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                <table class="w-full text-sm text-left text-gray-600">
                    <thead class="bg-gray-50 border-b">
                        <tr>
                            <th class="px-6 py-3">ID</th>
                            <th class="px-6 py-3">Judul</th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3">Jatuh Tempo</th>
                            <th class="px-6 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-6 py-3">{{ $task->id }}</td>
                                <td class="px-6 py-3">{{ $task->title }}</td>
                                <td class="px-6 py-3">
                                    <span class="px-2 py-1 rounded-lg text-black 
                                        {{ $task->status == 'Completed' ? 'bg-green-500' : 'bg-yellow-500' }}">
                                        {{ $task->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-3">{{ $task->due_date }}</td>
                                <td class="px-6 py-3 text-center">
                                    <a href="{{ route('tasks.show', $task->id) }}" 
                                       class="px-3 py-2 bg-blue-500 text-black rounded-md hover:bg-blue-600">
                                        Detail
                                    </a>

                                    @if (Auth::id() === $task->user_id)
                                        <a href="{{ route('tasks.edit', $task->id) }}" 
                                           class="px-3 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 ml-2">
                                            Edit
                                        </a>
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="px-3 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 ml-2"
                                                    onclick="return confirm('Yakin ingin menghapus task ini?')">
                                                Hapus
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
