<div class="list-group w-auto p-3 mt-2" style="border-radius: 10px">
    <div class="list-group-item" style="background-color: #3559E0" aria-current="true">
        <h4 style="color: #FFFFFF;"><b>Update User List</b></h4>
    </div>
    <div class="list-group-item">
        <div class="p-2 mt-3">
            <form action="{{ route('users.update', $users->id) }}" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-6">
                        @csrf
                        @method('PUT')
                        <fieldset>
                            <div class="mb-3">
                                <label for="disabledTextInput" class="form-label">User Name</label>
                                <input type="text" name="name" id="name"
                                    value="{{ old('name', $users->name) }}"class="form-control"
                                    placeholder="Disabled input">
                                @error('name')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="disabledTextInput" class="form-label">Email</label>
                                <input type="text" name="email" id="email"
                                    value="{{ old('email', $users->email) }}"class="form-control"
                                    placeholder="Disabled input">
                                @error('email')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="disabledTextInput" class="form-label">Password</label>
                                <input type="password" name="password" id="password"
                                    value="{{ old('password', $users->password) }}"class="form-control"
                                    placeholder="Disabled input">
                                @error('password')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label label">Permission</label>
                        </div>
                        <div class="row col-12 mb-3">
                            <div class="col-auto">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="inlineCheckboxOptions[]"
                                        id="inlineCheckbox1" value="option1">
                                    <label class="form-check-label form-label" for="inlineCheckbox1">View</label>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="inlineCheckboxOptions[]"
                                        id="inlineCheckbox2" value="option2">
                                    <label class="form-check-label form-label" for="inlineCheckbox2">Create</label>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="inlineCheckboxOptions[]"
                                        id="inlineCheckbox3" value="option3">
                                    <label class="form-check-label form-label" for="inlineCheckbox3">Edit</label>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="mb-3 form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="inlineCheckboxOptions[]"
                                        id="inlineCheckbox4" value="option4">
                                    <label class="form-check-label form-label" for="inlineCheckbox4">Delete</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-check form-switch">
                            <input name="ishidden" class="form-check-input" type="checkbox" role="switch"
                                id="ishidden" @if ($users->ishidden) checked @endif>
                            <label class="form-check-label" for="ishidden"> Hidding</label>
                        </div>

                        <div class="d-grid gap-1 d-md-flex justify-content-md-end position-absolute bottom-0 end-0"
                            style="padding:0 25px 25px 0">
                            <button style="border-radius: 20px; width:110px;" type="submit"
                                class="btn btn-primary">Update</button>
                            <a href="{{ route('users.index') }}" style="border-radius: 20px; width:110px;"
                                class="btn btn-primary" type="button">Cancel</a>
                        </div>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>
