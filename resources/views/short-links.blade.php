<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Short Links') }}
        </h2>
    </x-slot>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="bg-white">
        <div class="mx-auto max-w-7xl py-1 px-4 text-center sm:px-6 lg:px-2">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="px-4 sm:px-6 lg:px-8 pb-20">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-xl font-semibold text-gray-900">Short Links All</h1>
                    </div>
                    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                        <a href="{{ route('dashboard') }}">
                            <button type="button"
                                class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                </svg>

                                Add Short Links
                            </button>
                        </a>
                    </div>
                </div>
                @if (session('success'))
                    <div class="rounded-md bg-green-50 p-4 mt-2">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <!-- Heroicon name: mini/check-circle -->
                                <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-green-800"> {{ session('success') }}</p>
                            </div>
                            <div class="ml-auto pl-3">
                                <div class="-mx-1.5 -my-1.5">
                                    <button type="button"
                                        class="inline-flex rounded-md bg-green-50 p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 focus:ring-offset-green-50">
                                        <span class="sr-only">Dismiss</span>
                                        <!-- Heroicon name: mini/x-mark -->
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if (session('warning'))
                    <div class="rounded-md bg-red-50 p-4 mt-2">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <!-- Heroicon name: mini/x-circle -->
                                <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800">
                                    {{ session('warning') }}
                                </h3>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="-mx-4 mt-10 ring-1 ring-gray-300 sm:-mx-6 md:mx-0 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                            <tr class="divide-x divide-gray-200">
                                <th scope="col"
                                    class=" px-2 py-3.5 text-center text-sm font-semibold text-gray-900 lg:table-cell">
                                    #</th>
                                <th scope="col"
                                    class=" px-2 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">
                                    Name Link</th>
                                <th scope="col"
                                    class=" px-2 py-3.5 text-center text-sm font-semibold text-gray-900 lg:table-cell">
                                    Short Link</th>
                                <th scope="col"
                                    class=" px-2 py-3.5 text-center text-sm font-semibold text-gray-900 lg:table-cell">
                                    Full Link</th>
                                @if (Auth::user()->roles === 'admin')
                                    <th scope="col"
                                        class=" px-2 py-3.5 text-center text-sm font-semibold text-gray-900 lg:table-cell">
                                        User
                                    </th>
                                    <th scope="col"
                                        class=" px-2 py-3.5 text-center text-sm font-semibold text-gray-900 lg:table-cell">
                                        Manages Links
                                    </th>
                                @endif

                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach ($links as $index => $link)
                                <tr class="divide-x divide-gray-200">
                                    <td class="hidden px-2 py-3.5 text-sm text-gray-500 lg:table-cell">
                                        {{ $index + 1 }}</td>
                                    <td class="hidden px-2 py-3.5 text-sm text-left text-gray-500 lg:table-cell">
                                        {{ $link->name }}
                                    </td>
                                    <td class="hidden px-2 py-3.5 text-sm text-gray-500 lg:table-cell">
                                        <a href="{{ env('APP_URL', '') . "/short/$link->code" }}" target="_blank">
                                            {{ env('APP_URL', '') . "/short/$link->code" }}
                                        </a>
                                    </td>
                                    <td class="hidden px-2 py-3.5 text-sm text-left text-gray-500 lg:table-cell">
                                        <a href="{{ $link->link }}" target="_blank">{{ $link->link }}</a>
                                    </td>
                                    @if (Auth::user()->roles === 'admin')
                                        <td class="hidden px-2 py-3.5 text-sm text-gray-500 lg:table-cell">
                                            {{ $link->user->name ?? '-' }}
                                        </td>
                                        <td class=" px-2 py-3.5 text-sm text-gray-500 lg:table-cell">
                                            <span class="isolate inline-flex rounded-md shadow-sm">
                                                <a href="{{ route('short-links.edit', $link->id) }}">
                                                    <button type="button"
                                                        class="relative inline-flex items-center rounded-l-md border border-gray-300 bg-white px-2 py-2 text-sm font-medium text-lime-600 hover:bg-indigo-300 hover:text-white focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-4 h-3">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                                        </svg>

                                                        Edit
                                                    </button>
                                                </a>
                                                <form action="{{ route('short-links.destroy', $link->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        onclick="return confirm('Want to delete data?');"
                                                        class="relative -ml-px inline-flex items-center rounded-r-md border border-gray-300 bg-white px-2 py-2 text-sm font-medium text-red-600 hover:bg-indigo-300 hover:text-white focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor" class="w-4 h-3">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                        </svg>

                                                        Del
                                                    </button>
                                                </form>
                                            </span>


                                        </td>
                                    @endif
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    {{ $links->links() }}
                </div>
            </div>

        </div>
    </div>

</x-app-layout>
