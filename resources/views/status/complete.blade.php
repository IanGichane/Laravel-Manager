

<x-app-layout>

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="p-6 ">


                    <div class="grid grid-cols-[repeat(auto-fill,minmax(300px,1fr))]  auto-rows gap-3">

                        @foreach ($complete as $task)
                            <div class="max-w-xs p-4 bg-white rounded-lg shadow-lg shadow-gray-200">
                                <div class="flex items-center justify-between mt-4 gap-4">
                                    <span class="font-semibold text-gray-800">🍪 {{ $task->title }}</span>
                                    <a href={{ route('task.edit', ['task' => $task]) }}>
                                        <button
                                            class="text-xs leading-4 bg-gray-400 font-medium rounded-md text-white px-1 py-1 border-none transition-all duration-150 ease-in-out hover:bg-gray-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-transparent focus-visible:ring-offset-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-pencil">
                                                <path
                                                    d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z" />
                                                <path d="m15 5 4 4" />
                                            </svg>
                                        </button>
                                    </a>

                                </div>
                                <p class="mt-4 text-sm leading-5 text-gray-600">
                                    {{ $task->description }}

                                </p>
                                {{-- status --}}
                                <div class="flex items-center  mt-4 gap-4">
                                    <span>task status:</span>
                                    {{-- the task can either be in progress or complete --}}
                                    <button
                                        class="text-xs leading-4 text-gray-800 underline transition-all duration-300 ease-in-out border-none bg-transparent hover:text-gray-400 focus:outline-none focus-visible:ring-2 focus-visible:ring-transparent focus-visible:ring-offset-2">
                                        {{ $task->complete }}
                                    </button>

                                </div>
                                <div class="flex items-center justify-between mt-4 gap-4">
                                    {{-- due date --}}
                                    <p
                                        class="text-xs leading-4 text-gray-800 underline transition-all duration-300 ease-in-out border-none bg-transparent hover:text-gray-400 focus:outline-none focus-visible:ring-2 focus-visible:ring-transparent focus-visible:ring-offset-2">
                                        {{ $task->due_date }}
                                    </p>


                                    {{-- trash can --}}

                                    <form   action="{{ route('task.destroy', $task->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button
                                            class="text-xs leading-4 bg-gray-900 font-medium rounded-md text-white px-1 py-1 border-none transition-all duration-150 ease-in-out hover:bg-gray-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-transparent focus-visible:ring-offset-2">


                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-trash-2">
                                                <path d="M3 6h18" />
                                                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                                <line x1="10" x2="10" y1="11" y2="17" />
                                                <line x1="14" x2="14" y1="11" y2="17" />
                                            </svg>
                                        </button>
                                    </form>


                                </div>
                            </div>
                        @endforeach

                    </div>


            </div>





        </div>
    </div>
</x-app-layout>

