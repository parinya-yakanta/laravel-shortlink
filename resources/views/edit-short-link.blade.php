<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Short Link') }}
        </h2>
    </x-slot>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="bg-white">
        <div class="mx-auto max-w-7xl py-1 px-4 text-center sm:px-6 lg:px-2">
            <div class="overflow-hidden bg-white py-2 px-4 sm:px-6">
                <div class="relative mx-auto max-w-xl my-5">
                    <div class="text-center">
                        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Edit Short Link</h2>
                        @if (session('link'))
                            <div class="rounded-md bg-green-50 p-4">
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
                                        <p class="text-sm font-medium text-green-800"> Update Link Successfully</p>
                                    </div>
                                    <div class="ml-auto pl-3">
                                        <div class="-mx-1.5 -my-1.5">
                                            <button type="button"
                                                class="inline-flex rounded-md bg-green-50 p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 focus:ring-offset-green-50">
                                                <span class="sr-only">Dismiss</span>
                                                <!-- Heroicon name: mini/x-mark -->
                                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path
                                                        d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <p class="mt-4 text-lg leading-6 text-gray-500">-
                                หากมีการแก้ไขรหัสลิงค์สั้นของคุณจะมีการเปลี่ยนแปลงด้วย -</p>
                        @endif

                    </div>
                    <div class="mt-2">
                        <form action="{{ route('short-links.update', Arr::get($link, 'id')) }}" method="POST"
                            class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">

                            @csrf
                            @method('PUT')
                            <div class="sm:col-span-2">
                                <div class="mt-2">
                                    <label for="name"
                                        class="text-sm text-indigo-600 flex justify-start">ชื่อลิงค์</label>
                                    <input type="text" name="name" id="name"
                                        class="block w-full rounded-md border-gray-300 py-3 px-4 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                        value="{{ Arr::get($link, 'name') }}" placeholder="ชื่อลิงค์สั้น">
                                </div>
                                <div class="mt-2">
                                    <label for="link"
                                        class="text-sm text-indigo-600 flex justify-start">ลิงค์ที่ต้องการแปลง</label>
                                    <input type="text" name="link" id="link"
                                        class="block w-full rounded-md border-gray-300 py-3 px-4 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                        value="{{ Arr::get($link, 'link') }}" placeholder="ใส่ลิงค์ที่ต้องการแปลง"
                                        required>
                                </div>
                            </div>
                            <div class="sm:col-span-2">
                                <button type="submit"
                                    class="inline-flex w-full items-center justify-center rounded-md border border-transparent bg-green-700 px-6 py-3 text-base font-bold text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    Update Short Link
                                </button>
                            </div>
                        </form>

                    </div>
                    <div class="py-5">
                        <p class="text-orange-600 font-bold text-lg">ลิงค์สั้นของคุณคือ..</p>
                        <p>--</p>
                        @if (session('name'))
                            <span class=" text-blue-500 text-sm flex justify-start">ชื่อลิงค์ :
                                {{ session('name') }}</span>
                        @endif
                        @if (session('link'))
                            <input type="text" name="link"
                                class="block w-full rounded-md border-gray-300 py-3 px-4 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                value="short link : {{ session('link') }}" disabled>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
