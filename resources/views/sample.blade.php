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
            <button wire:click="create()"cclass="bg-green-700 text-white font-bold py-2 px-4 rounded my-3">Create reservation</button>
            @if($isModalOpen)
            @include('livewire.create')
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">Name</th>
                        <th class="px-4 py-2">Area</th
                    </tr>
                </thead>
                <tbody>
                    @if Auth::(role->'admin')
                    @foreach($sample as $sample)
                    <tr>
                        <td class="border px-4 py-2">{{ $sample->name }}</td>
                        <td class="border px-4 py-2">{{ $sample->area}}</td>
                        <td class="border px-4 py-2">{{ $sample->status}}</td>
                        <td class="border px-4 py-2">
                            <button wire:click="edit({{ $sample->name }})"
                                class="bg-blue-500  text-white font-bold py-2 px-4 rounded">Approve</button>
                            <button wire:click="delete({{ $sample->name }})"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Reject</button>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td class="border px-4 py-2">{{ $sample->name }}</td>
                        <td class="border px-4 py-2">{{ $sample->area}}</td>
                        <td class="border px-4 py-2">{{ $sample->status}}</td>
                        <td class="border px-4 py-2">
                            <button wire:click="delete({{ $sample->name }})"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
