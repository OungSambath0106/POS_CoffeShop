<div class="list-group w-auto p-3 mt-2" style="border-radius: 10px">
    <div class="list-group-item" style="background-color: #3559E0" aria-current="true">
        <h4 style="color: #FFFFFF;"><b>Create Customer List</b></h4>
    </div>
    <div class="list-group-item">
        <div class="p-2 mt-3">
            <form action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-6">
                        @csrf
                        <fieldset>

                            <div class="mb-3">
                                <label for="disabledTextInput" class="form-label">Customer Name</label>
                                <input type="text" name="customername" id="customername" class="form-control"
                                    placeholder="Disabled input">
                                @error('customername')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="disabledTextInput" class="form-label">Company Name</label>
                                <input type="text" name="companyname" id="companyname" class="form-control"
                                    placeholder="Disabled input">
                            </div>
                            <div class="mb-3">
                                <label for="disabledTextInput" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Disabled input">
                                @error('email')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="disabledTextInput" class="form-label">Phone Number</label>
                                <input type="text" name="phone" id="phone" class="form-control"
                                    placeholder="Disabled input">
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="disabledTextInput" class="form-label">Address</label>
                            <textarea name="address" style="height: 150px; vertical-align: top;" id="address" class="form-control" placeholder=""></textarea>
                        </div>


                        <div class="form-check form-switch">
                            <input name="ishidden" class="form-check-input" type="checkbox" role="switch"
                                id="ishidden">
                            <label class="form-check-label form-label" for="flexSwitchCheckDefault"> Hidding</label>
                        </div>

                        <div class="d-grid gap-1 d-md-flex justify-content-md-end position-absolute bottom-0 end-0"
                            style="padding:0 25px 25px 0">
                            <button style="border-radius: 20px; width:110px;" type="submit"
                                class="btn btn-primary">Create</button>
                            <a href="{{ route('customer.index') }}" style="border-radius: 20px; width:110px;"
                                class="btn btn-primary" type="button">Cancel</a>
                        </div>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>
