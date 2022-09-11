<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="bg-white">
        <div class="mx-auto max-w-7xl py-1 px-4 text-center sm:px-6 lg:px-2">
            <div class="overflow-hidden bg-white py-2 px-4 sm:px-6">
                <div class="relative mx-auto max-w-xl my-5">
                    <div class="text-center">
                        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Short Link</h2>
                        <p class="mt-4 text-lg leading-6 text-gray-500">ใส่ลิงค์ URL เพื่อสร้าง Short Link</p>
                    </div>
                    <div class="mt-2">
                        <form action="{{ route('short-links.store') }}" method="POST"
                            class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">

                            @csrf
                            <div class="sm:col-span-2">
                                <div class="mt-2">
                                    <input type="text" name="name"
                                        class="block w-full rounded-md border-gray-300 py-3 px-4 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                        placeholder="ชื่อลิงค์สั้น">
                                </div>
                                <div class="mt-2">
                                    <input type="text" name="link"
                                        class="block w-full rounded-md border-gray-300 py-3 px-4 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                        placeholder="ใส่ลิงค์ที่ต้องการแปลง"
                                        required>
                                </div>
                            </div>
                            <div class="sm:col-span-2">
                                <button type="submit"
                                    class="inline-flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    Create Short Link
                                </button>
                            </div>
                        </form>

                    </div>
                    <div class="py-5">
                        <p class="text-orange-600 font-bold text-lg">ลิงค์สั้นของคุณคือ..</p>
                        <p>--</p>
                        @if (session('name'))
                        <span class=" text-blue-500 text-sm flex justify-start">ชื่อลิงค์ : {{ session('name') }}</span>
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
