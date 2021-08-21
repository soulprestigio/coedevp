<x-slot name="header">
<h2 class="text-center">Coedev LARAVEL demo</h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                role="alert">
                <div class="flex">
                <div>
                    <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                    <th class="px-4 py-2 w-20">Name</th>
                    <th class="px-4 py-2">Area</th>
                    </tr>
                </thead>
                <tbody>             
                    @foreach($reserved as $reserved)
                    <tr>
                        <td class="border px-4 py-2">{{ $reserved->name }}</td>
                        <td class="border px-4 py-2">{{ $reserved->area }}</td>
                        <td class="border px-4 py-2">{{ $reserved->status }}</td>
                        <td class="border px-4 py-2">
                        <button wire:click="approve({{ $sample->name }})"
                        class="bg-blue-500  text-white font-bold py-2 px-4 rounded">Approve</button>
                        <button wire:click="rejected({{ $sample->name }})"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Reject</button>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>s
