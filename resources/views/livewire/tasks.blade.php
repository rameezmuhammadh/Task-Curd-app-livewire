<div>
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
    @endif
    @if($edit_mode == true)
        @include('livewire.edit')
    @else
        @include('livewire.create')
    @endif
    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Description</th>
                <th width="150px">Action</th>
            </tr>
        </thead>
        <tbody>
         @foreach ($tasks as $task)
            <tr>
                <td>{{$task->id}}</td>
                <td>{{$task->title}}</td>
                <td>{{$task->description}}</td>
                <td>
                    <button wire:click="edit({{$task->id}})"  class="btn btn-primary btn-sm">Edit</button>
                    <button wire:click="delete({{$task->id}})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
</div>

