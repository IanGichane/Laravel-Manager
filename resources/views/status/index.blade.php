<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="p-6 text-gray-900 grid-cols-3 gap-4 mt-12">


                    @foreach ($tasks as $task)



                        <div
                            class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-slate-800 dark:border-gray-700">
                            <div class=" text-gray-500 dark:text-gray-400 mb-3" aria-hidden="true"
                             >
                             {{$task->title}}
                            </div>

                            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400"> {{$task->title}}</p>
                            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400"> {{$task->description}}</p>

                            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400"> {{$task->complete}}</p>
                            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400"> {{$task->in_progress}}</p>
                            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400"> {{$task->due_date}}</p>


                            <div class="">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                                </div>

                                <div>
                                    <button>
                                        close
                                    </button>
                                </div>

                            </div>

                        </div>
                    @endforeach


                </div>





        </div>
    </div>
</x-app-layout>
