<div class="list-group w-auto p-3" style="border-radius: 10px">
    <div class="list-group-item" style="background-color: #3559E0" aria-current="true">
        <h4 style="color: #FFFFFF;"><b>Customers Hidden Lsit</b></h4>
    </div>
    <div class="list-group-item">
        <div class="p-2 mt-3">
            <form role="search" action="{{ url()->current() }}" method="GET">
                @csrf
                <div class="input-group inline">
                    <input type="text" class="form-control search-bar" name="search" style="border-radius: 10px"
                        placeholder="Search for something" aria-label="Search" />

                    <div>
                        <!-- Add refresh button -->
                        <button type="submit" class="btn btn-primary" value="Refresh"
                            style="background-color: #3559E0; margin-left:1vw;">
                            <i class="fas fa-sync-alt"></i> Refresh
                        </button>
                    </div>

                    <div>
                        <a href="{{ route('customer.index') }}" class="btn btn-primary "
                            style="background-color: #3559E0; margin-left: 30vw;"><i class="fas fa-eye"
                                style="color: #ffffff;"></i></i> UnHide</a>
                    </div>
                </div>
            </form>
        </div>

        <div class="table-responsive">

            <table class="table">

                <thead class="sticky">
                    <tr>
                        <th class="p-3 col-0" scope="col">#</th>
                        <th class="p-3 col-2" scope="col">Customer Name</th>
                        <th class="p-3 col-2" scope="col">Company Name</th>
                        <th class="p-3 col-2" scope="col">Phone</th>
                        <th class="p-3 col-2" scope="col">Email</th>
                        <th class="p-3 col-2" scope="col">Address</th>
                        <th class="p-3 col-2" scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($customers as $cus)
                        <tr>
                            @if ($cus->ishidden != 0)
                                <td class="p-3" scope="row"> {{ $cus->id }} </td>
                                <td class="p-3" scope="row"> {{ $cus->customername }} </td>
                                <td class="p-3" scope="row"> {{ $cus->companyname }} </td>
                                <td class="p-3" scope="row"> {{ $cus->phone }} </td>
                                <td class="p-3" scope="row"> {{ $cus->email }} </td>
                                <td class="p-3" scope="row"> {{ $cus->address }} </td>
                                <td class="p-3" scope="row" style="width: 250px">
                                    <form method="POST"
                                        action="{{ route('customer.destroy', ['customer' => $cus->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('customer.show', ['customer' => $cus->id]) }}" type="button"
                                            class="btn view" style="background-color: #38E035;border: none;"><i
                                                class="fas fa-eye" style="color: #ffffff;"></i></a>
                                        <a href="{{ route('customer.edit', ['customer' => $cus->id]) }}" type="button"
                                            class="btn edit" style="background-color: #3559E0;border: none;"><i
                                                class="fas fa-edit" style="color: #ffffff;"></i></a>
                                        <button class="btn trash" onclick="return confirm()"
                                            style="background-color: #FF0000;border: none;"><i class="fas fa-trash"
                                                style="color: #ffffff;"></i></button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <h5> No Data </h5>
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

        </div>

    </div>
</div>

<script>
    document.getElementById('search').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting normally
        window.location.reload(); // Reload the page
    });
</script>