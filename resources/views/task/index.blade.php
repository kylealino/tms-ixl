
<x-app-layout>
    <div class="pt-3">
        <x-slot name="header">
            <div class="grid grid-cols-3 gap-4">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
                    {{ __('List of task:') }} 
                </h2>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight col-end-6">
                    <a href="{{route('task.create')}}">Create a Task</a>
                </h2>
            </div>
        </x-slot>

        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <!-- Pagination Links -->

    <div class="pt-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 ">

                <form method="GET" action="{{ route('task.index') }}" class="mb-4">
                    <div class="flex items-center space-x-4">
                        <input 
                            type="text" 
                            name="search" 
                            class="p-2 border border-gray-300 rounded" 
                            value="{{ request()->input('search') }}" 
                            placeholder="Search tasks...">
                        <select name="status" class="p-2 border border-gray-300 rounded">
                            <option value="">Status</option>
                            @foreach($status as $stat)
                                <option value="{{ $stat->status }}" 
                                    {{ request()->input('status') == $stat->status ? 'selected' : '' }}>
                                    {{ $stat->status }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Search</button>
                    </div>
                </form>
                <div class="py-4">
                    {{ $task->links() }}  <!-- This will render pagination controls -->
                </div>
                <table class="border-collapse border table-auto">
                    <tr>
                        <th class="p-5">ID</th>
                        <th class="p-5">Title</th>
                        <th class="p-5">Description</th>
                        <th class="p-5">Due Date</th>
                        <th class="p-5">Assigned User</th>
                        <th class="p-5">Status</th>
                        <th class="p-5">Encoded Date</th>
                        <th class="p-5">Edit</th>
                        <th class="p-5">Delete</th>
                    </tr>
                    @forelse($task as $task )
                        <tr >
                            <td class="p-5">{{$task->id}}</td>
                            <td class="p-5">{{$task->title}}</td>
                            <td class="p-5">{{$task->description}}</td>
                            <td class="p-5">{{$task->due_date}}</td>
                            <td class="p-5">{{$task->assigned_user}}</td>
                            <td class="p-5">{{$task->status}}</td>
                            <td class="p-5">{{$task->created_at}}</td>
                            <td class="p-5">
                                <a href="{{route('task.edit', ['task' => $task])}}">Edit</a>
                            </td>
                            <td class="p-5">
                                <form method="post" action="{{route('task.destroy', ['task' => $task])}}">
                                    @csrf 
                                    @method('delete')
                                    <input type="submit" value="Delete" />
                                </form>
                            </td>
                        </tr>
                    @empty:
                        <tr>
                            <td class="p-5">No data found</td>
                        </tr>
                    @endforelse
                </table>

            </div>
        </div>
    </div>

</x-app-layout>
