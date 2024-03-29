<div class="list-group w-auto p-3 mt-3" style="border-radius: 10px">
    <div class="list-group-item" style="background-color: #3559E0" aria-current="true">
        <h4 style="color: #FFFFFF;"><b>Add New User</b></h4>
    </div>
    <div class="list-group-item">
        <div class="p-1">
            <form class="row w-100 p-3 d-flex" action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="mb-4 col-6">
                    <label class="form-label label">User Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter UserName">
                    @error('customername')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4 col-6">
                    <label class="form-label label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter Email">
                    @error('email')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4 col-12">
                    <label class="form-label label">Pasword</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter Password">
                    @error('address')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-1">
                    <label for="exampleInputPassword1" class="form-label label">Permission</label>
                </div>
                <div class="row col-12 mb-3">
                    <div class="col-auto">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="inlineCheckboxOptions[]"
                                id="inlineCheckbox1" value="option1">
                            <label class="form-check-label label" for="inlineCheckbox1">View</label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="inlineCheckboxOptions[]"
                                id="inlineCheckbox2" value="option2">
                            <label class="form-check-label label" for="inlineCheckbox2">Create</label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="inlineCheckboxOptions[]"
                                id="inlineCheckbox3" value="option3">
                            <label class="form-check-label label" for="inlineCheckbox3">Edit</label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="mb-3 form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="inlineCheckboxOptions[]"
                                id="inlineCheckbox4" value="option4">
                            <label class="form-check-label label" for="inlineCheckbox4">Delete</label>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <label for="exampleInputPassword1" class="form-label label">Is Hidden</label>
                </div>
                <div class="mb-4 col-12 form-check form-switch">
                    <input class="form-check-input check" type="checkbox" value="1" name="ishidden"
                        id="flexSwitchCheckDefault">
                </div>
                <div class="d-grid gap-4 d-md-flex justify-content-md-end">
                    <button type="submit" id="btn" class="btn btn-primary"
                        style="font-weight: 600; background-color: #3559E0; width: 10vw;">Save</button>
                    <a href="{{ route('users.index') }}" class="btn btn-primary"
                        style="font-weight: 600; background-color: #3559E0; width: 10vw;">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
