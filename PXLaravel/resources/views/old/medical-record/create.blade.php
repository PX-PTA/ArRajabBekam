<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Medical-Records-Create') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form class="w-full max-w-lg">
                        <div class="flex flex-wrap -mx-2 mb-2">              
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-first-name">
                                    Nama
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="nama lengkap">
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-first-name">
                                   Tanggal
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="date">
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-2 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-first-name">
                                    Keluhan
                                </label>
                                <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" placeholder="alamat lengkap" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-2 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-first-name">
                                    Diagnosa
                                </label>
                                <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" placeholder="alamat lengkap" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-2 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-first-name">
                                    Tindakan
                                </label>
                                <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" placeholder="alamat lengkap" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-2 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-first-name">
                                    Herbal
                                </label>
                                <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" placeholder="alamat lengkap" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-2 mb-2">              
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-first-name">
                                    Tekanan darah Sys
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="nama lengkap">
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-first-name">
                                    Tekanan darah Dia
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="08123456789">
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-first-name">
                                   Terapis
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="08123456789">
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <button class="bg-white text-gray-800 font-bold py-1 px-3 rounded" onclick="window.location='{{route("patient.create")}}'">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
