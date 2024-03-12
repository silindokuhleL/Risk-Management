<x-app-layout>
    <x-slot name="header">
        <label for="searchInput" class="sr-only">Search</label>
        <div class="relative sm:w-full md:w-80">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 10a6 6 0 11-12 0 6 6 0 0112 0zM22 22l-4-4"></path>
                </svg>
            </div>
            <input type="text"
                   id="searchInput"
                   class="block w-full pl-10 pr-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500"
                   placeholder="Search...">
        </div>

    </x-slot>
    <div class="w-full flex justify-center items-center">
        @if(session('success'))
            <div id="successAlert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-3" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div id="errorAlert" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif
    </div>

    <script>
        // Function to hide success and error alerts after 5 seconds
        setTimeout(function() {
            var successAlert = document.getElementById('successAlert');
            if (successAlert) {
                successAlert.style.display = 'none';
            }
            var errorAlert = document.getElementById('errorAlert');
            if (errorAlert) {
                errorAlert.style.display = 'none';
            }
        }, 5000); // 5000 milliseconds = 5 seconds
    </script>



    <div class="flex">
        <div class="w-full">
            <div class="py-12">
                <div class="mx-auto sm:px-4 md:px-8">
                    <div class="flex flex-col md:flex-row justify-between items-center border-l-4 border-green-500 pl-4 py-4">
                        <h2 class="text-lg font-semibold mb-4 text-gray-600 flex items-center">Risk Owners</h2>
                        <a href="{{ route('risk-owners.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Add Risk Owner</a>
                    </div>
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-3">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="overflow-x-auto">
                                <table class="w-full divide-y divide-gray-200" id="dataTable">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Options</th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($riskOwners as $riskOwner)
                                        <tr>
                                            <td class="px-6 py-4 md:whitespace-nowrap font-bold">{{ $riskOwner->name }}</td>
                                            <td class="px-6 py-4 md:whitespace-nowrap">{{ $riskOwner->title }}</td>
                                            <td class="px-6 py-4 md:whitespace-nowrap">{{ $riskOwner->email }}</td>
                                            <td class="px-6 py-4 md:whitespace-nowrap">{{ $riskOwner->role->name }}</td>
                                            <td class="px-6 py-4 md:whitespace-nowrap text-sm font-medium">
                                                <a href="{{ route('risk-owners.edit', ['risk_owner' => $riskOwner->id]) }}" class="text-indigo-600 hover:text-indigo-900 mr-2" title="Edit"> <!-- Added mr-2 for margin -->
                                                    <i class="fa-solid fa-pencil text-primary"></i>
                                                </a>
                                                <a href="{{ route('risk-owners.show', ['risk_owner' => $riskOwner->id]) }}" class="text-green-600 hover:text-green-900 mr-2" title="Show"> <!-- Added mr-2 for margin -->
                                                    <i class="fa-regular fa-eye text-success"></i>
                                                </a>
                                                <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this risk owner?')) document.getElementById('delete-form-{{ $riskOwner->id }}').submit();" class="text-red-600 hover:text-red-900" title="Delete">
                                                    <i class="fa-solid fa-trash-can text-danger"></i>
                                                </a>
                                                <form id="delete-form-{{ $riskOwner->id }}" action="{{ route('risk-owners.destroy', ['risk_owner' => $riskOwner->id]) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        setTimeout(function() {
            var successAlert = document.getElementById('successAlert');
            if (successAlert) {
                successAlert.style.display = 'none';
            }
            var errorAlert = document.getElementById('errorAlert');
            if (errorAlert) {
                errorAlert.style.display = 'none';
            }
        }, 5000);
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const dataTable = document.getElementById('dataTable');
            const rows = dataTable.getElementsByTagName('tr');

            searchInput.addEventListener('keyup', function(event) {
                const query = event.target.value.toLowerCase();

                for (let i = 0; i < rows.length; i++) {
                    const row = rows[i];
                    const cells = row.getElementsByTagName('td');
                    let found = false;

                    for (let j = 0; j < cells.length; j++) {
                        const cell = cells[j];

                        if (cell.textContent.toLowerCase().includes(query)) {
                            found = true;
                            break;
                        }
                    }

                    if (found) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                }
            });
        });
    </script>
</x-app-layout>
