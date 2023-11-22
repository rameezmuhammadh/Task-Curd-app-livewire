<form>
    <div class="form-group">
        <label for="exampleFormControlInput1">Title:</label>
        <input wire:model='title' type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Title" >
        @error('title')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Description:</label>
        <textarea wire:model='description' type="email" class="form-control" id="exampleFormControlInput2"  placeholder="Enter Description"></textarea>
        @error('description')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <button wire:click.prevent="store()" class="btn btn-success mt-3">Save</button>
</form>