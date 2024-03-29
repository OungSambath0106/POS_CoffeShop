<div class="list-group w-auto p-3 mt-3" style="border-radius: 10px">
    <div class="list-group-item" style="background-color: #3559E0" aria-current="true">
        <h4 style="color: #FFFFFF;"><b>Add New Customer</b></h4>
    </div>
    <div class="list-group-item">
        <div class="p-1">
            <form class="row w-100 p-3 d-flex" action="{{ route('customer.store') }}" method="POST">
                @csrf
                <div class="mb-4 col-6">
                    <label class="form-label label">Customer Name</label>
                    <input type="text" class="form-control" name="customername"" placeholder="Enter CustomerName">
                    @error('customername')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4 col-6">
                    <label class="form-label label">Company Name</label>
                    <input type="text" class="form-control" name="companyname"" placeholder="Enter CompanyName">
                    @error('companyname')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4 col-6">
                    <label class="form-label label">Phone</label>
                    <input type="text" class="form-control" name="phone" placeholder="Enter Phone">
                    @error('phone')
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
                    <label class="form-label label">Address</label>
                    <input type="text" class="form-control" name="address" placeholder="Enter Address">
                    @error('address')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="exampleInputPassword1" class="form-label label">Is Hidden</label>
                </div>
                <div class="mb-4 col-12 form-check form-switch">
                    <input class="form-check-input check" type="checkbox" value="1" name="ishidden" id="flexSwitchCheckDefault">
                </div>
                <div class="d-grid gap-4 d-md-flex justify-content-md-end">
                    <button type="submit" id="btn" class="btn btn-primary"
                        style="font-weight: 600; background-color: #3559E0; width: 10vw;">Save</button>
                    <a href="{{ route('customer.index') }}" class="btn btn-primary"
                        style="font-weight: 600; background-color: #3559E0; width: 10vw;">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
