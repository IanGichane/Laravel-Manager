<x-app-layout>


    <div class="mt-6">

<h1>Edit task</h1>
        <form class="max-w-sm mx-auto flex flex-col" action="{{ route('task.update', $task->id) }}" method="POST">
            @csrf
            @method('put')
            {{-- title --}}
            <div class="mb-5">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 ">title</label>
                <input type="text" id="title" name="title" value="{{ old('title', $task->title) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                      />
            </div>

            {{-- description --}}
            <div class="mb-5">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">Description</label>
                <textarea id="description" rows="4" name="description"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500  dark:placeholder-gray-400 e dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    >{{ old('description', $task->description) }}</textarea>
            </div>

            <div class="flex gap-4 mb-5">
                {{-- bool progress --}}
                <div class="flex items-start mb-5">
                    <div class="flex items-center h-5">
                        <input id="inprogress" type="checkbox" value="{{ $task->inprogress }}" name="inprogress"
                            class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:border-gray-600  dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                             />
                    </div>
                    <label for="inprogress" class="ms-2 text-sm font-medium text-gray-900 ">InProgress</label>
                </div>
                {{-- bool complete --}}
                <div class="flex items-start space-y-">
                    <div class="flex items-center h-5">
                        <input id="complete" type="checkbox" value="{{ $task->complete }} " name="complete"
                            class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                             />
                    </div>
                    <label for="complete" class="ms-2 text-sm font-medium text-gray-900 ">Complete</label>
                </div>
            </div>

            {{-- date --}}
            <div class="mb-5">

                <input type="date" id="birthday" name="due_date" value={{ $task->due_date }}
                    class=" border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   dark:focus:ring-blue-500 dark:focus:border-blue-500"
                     />
            </div>




            <button type="submit" value="Submit"
                class="space-y-3 bg-primary hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add task</button>
        </form>

    </div>
</x-app-layout>
