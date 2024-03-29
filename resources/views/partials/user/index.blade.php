<div class="list-group w-auto p-3" style="border-radius: 10px">
    <div class="list-group-item" style="background-color: #3559E0" aria-current="true">
        <h4 style="color: #FFFFFF;"><b>Users Lsit</b></h4>
    </div>
    <div class="list-group-item">
        <div class="p-2 mt-3">
            <form role="search" action="{{ url()->current() }}" method="GET">
                @csrf
                <div class="input-group inline">
                    <input type="text" class="form-control search-bar" name="search" style="border-radius: 10px"
                        placeholder="Search for something" aria-label="Search" />
                    <button class="btn-search" type="submit" style="border-radius: 10px;"><i class="fas fa-search"
                            style="color: #3559e0;"></i></button>

                    <div>
                        <a href="{{ route('users.create') }}" class="btn btn-primary "
                            style="background-color: #3559E0; margin-left: 22vw;"><i class="fas fa-plus-circle fa-lg"
                                style="color: #ffffff;"></i> Add New Customer</a>
                    </div>
                </div>
            </form>
        </div>

        <div class="table-responsive">

            <table class="table">

                <thead>
                    <tr>
                        <th class="p-3 col-0" scope="col">#</th>
                        <th class="p-3 col-2" scope="col">User Name</th>
                        <th class="p-3 col-2" scope="col">Email</th>
                        <th class="p-3 col-3" scope="col">Password</th>
                        <th class="p-3 col-2" scope="col">Permission</th>
                        <th class="p-3 col-3" scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td class="p-3" scope="row"> {{ $user->id }} </td>
                            <td class="p-3" scope="row"> {{ $user->name }} </td>
                            <td class="p-3" scope="row"> {{ $user->email }} </td>
                            <td class="p-3" scope="row"> {{ $user->password }} </td>
                            <td class="p-3" scope="row">  </td>
                            <td class="p-3" scope="row" style="width: 250px">
                                <form method="POST" action="{{ route('users.destroy', ['user' => $user->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('users.show', ['user' => $user->id]) }}" type="button"
                                        class="btn view" style="background-color: #38E035;border: none;"><i
                                            class="fas fa-eye" style="color: #ffffff;"></i></a>
                                    <a href="{{ route('users.edit', ['user' => $user->id]) }}" type="button"
                                        class="btn edit" style="background-color: #3559E0;border: none;"><i
                                            class="fas fa-edit" style="color: #ffffff;"></i></a>
                                    <button class="btn trash" onclick="return confirm()"
                                        style="background-color: #FF0000;border: none;"><i class="fas fa-trash"
                                            style="color: #ffffff;"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10">
                                <h5> No Data </h5>
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

        </div>

    </div>
</div>
