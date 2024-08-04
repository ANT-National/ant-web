<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="container mx-auto px-4 mt-5">
        <h1 class="text-2xl font-bold mb-4">Event Registrations</h1>

        <div class="overflow-x-auto">
            <table class="table-fixed">
                <thead class="bg-gray-100">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Gender</th>
                    <th>Governorate</th>
                    <th>Delegation</th>
                    <th>City</th>
                    <th>Situation</th>
                    <th>Is Member</th>
                    <th>Date Registered</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($registrations as $registration)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $registration->user->full_name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $registration->user->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $registration->user->phone_number }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $registration->user->gender->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $registration->governorate }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $registration->delegation }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $registration->city }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $registration->situation->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $registration->user->is_member ? 'Yes' : 'No' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $registration->created_at->format('Y-m-d H:i:s') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>>
