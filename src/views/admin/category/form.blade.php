<form action="{{ $url }}" id="addForm">
    @csrf
    <label for="">Category Name:</label>
    <input type="text" class="form-control" 
            name="name" id="cat_name"
            value="{{ !empty($data) && $data->name ? $data->name : old('name') }}"
            >
    <div class="form-check">
        <input type="checkbox" name="status"  id="status" class="form-check-input"> 
        <label for="">Active/Deactive</label>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>