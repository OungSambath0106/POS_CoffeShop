<div class="list-group w-auto p-3 mt-3" style="border-radius: 10px">
    <div class="list-group-item" style="background-color: #3559E0" aria-current="true">
        <h4 style="color: #FFFFFF;"><b>Update Customer</b></h4>
    </div>
    <div class="list-group-item">
        <div class="p-1">
            <form class="row w-100 p-3 d-flex" action="{{ route('customer.update', ['customer' => $customers->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4 col-6">
                    <label for="exampleInputName1" class="form-label label">Customer Name</label>
                    <input type="text" value="{{ $customers->customername }}" class="form-control"
                        name="customername">
                </div>
                <div class="mb-4 col-6">
                    <label for="exampleInputName1" class="form-label label">Company Name</label>
                    <input type="text" value="{{ $customers->companyname }}" class="form-control" name="companyname">
                </div>
                <div class="mb-4 col-6">
                    <label for="exampleInputPhone1" class="form-label label">Phone</label>
                    <input type="text" value="{{ $customers->phone }}" class="form-control" name="phone">
                </div>
                <div class="mb-4 col-6">
                    <label for="exampleInputEmail1" class="form-label label">Email</label>
                    <input type="email" value="{{ $customers->email }}" class="form-control" name="email">
                </div>
                <div class="mb-4">
                    <label for="exampleInputAddress1" class="form-label label">Address</label>
                    <input type="text" value="{{ $customers->address }}" class="form-control" name="address">
                </div>
                <div class="col-12">
                    <label for="exampleInputPassword1" class="form-label label">Is Hidden</label>
                </div>
                <div class="mb-4 col-12 form-check form-switch">
                    <input class="form-check-input check" value="{{ $customers->ishidden}}" type="checkbox" id="flexSwitchCheckDefault">
                </div>
                <div class="d-grid gap-4 d-md-flex justify-content-md-end">
                    <button type="submit" id="btn" class="btn btn-primary"
                        style="font-weight: 600; background-color: #3559E0; width: 10vw;">Update</button>
                    <a href="{{ route('customer.index') }}" class="btn btn-primary"
                        style="font-weight: 600; background-color: #3559E0; width: 10vw;">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
