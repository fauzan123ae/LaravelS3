<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Task
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h1 class="text-2xl font-bold text-gray-900 mb-4">Detail Task</h1>

                <div class="border rounded-lg overflow-hidden shadow-sm mb-6">
                    <div class="bg-gray-100 px-4 py-2">
                        <h2 class="text-xl font-semibold text-gray-800">{{ $task->title }}</h2>
                    </div>
                    <div class="p-4">
                        <p class="mb-2"><strong>Deskripsi:</strong> {{ $task->description }}</p>
                        <p class="mb-2"><strong>Status:</strong> <span class="text-blue-600">{{ ucfirst($task->status) }}</span></p>
                        <p class="mb-2"><strong>Tanggal Jatuh Tempo:</strong> 
                            <span class="text-red-500">{{ \Carbon\Carbon::parse($task->due_date)->format('Y-m-d') }}</span>
                        </p>
                        <p class="mb-2"><strong>Kategori:</strong> <span class="text-green-600">{{ $task->category->name ?? 'Tidak Ada Kategori' }}</span></p>
                        <p class="mb-2"><strong>User ID:</strong> {{ $task->user_id }}</p>
                    </div>
                </div>

                <h2 class="text-xl font-bold text-gray-900 mb-4">Riwayat Perubahan Status</h2>
                <ul class="list-disc pl-6">
                    @forelse ($task->histories as $history)
                        <li class="mb-4">
                            <p><strong>Status:</strong> <span class="text-blue-600">{{ ucfirst($history->status) }}</span></p>
                            <p><strong>Tanggal Perubahan:</strong> <span class="text-gray-700">{{ $history->created_at->format('Y-m-d H:i') }}</span></p>
                            <p><strong>Deskripsi:</strong> {{ $history->description ?? 'Tidak ada deskripsi' }}</p>
                        </li>
                    @empty
                        <li class="text-gray-600">Belum ada riwayat perubahan status.</li>
                    @endforelse
                </ul>

                <div class="mt-6">
                    <a href="{{ route('tasks.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Kembali ke Daftar Task
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
