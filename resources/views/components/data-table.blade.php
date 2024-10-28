<div id="mytable-container">
    <div class="mytabletitle">
        <h2>{{ $title }}</h2>
    </div>

    <div class="search-container">
        <form method="GET" action="{{ route($searchRoute) }}">
            <input type="text" id="myinput" name="search" autocomplete="off" placeholder="Search.." title="Type in a keyword">
            <button type="submit" id="search" class="redbtn">Search</button>
        </form>
        <a class="redbtn" href="{{ route($createRoute) }}">Create</a>
    </div>

    @if($records->isEmpty())
        <h2 style="display: flex; min-height: 40vh; align-items: center; justify-content: center">No records found</h2>
    @else
        <table id="mytable">
            <thead>
                <tr>
                    @foreach($headers as $header)
                        <th scope="col">{{ $header }}</th>
                    @endforeach
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($records as $item)
                    <tr>
                        @foreach($headers as $header)
                            <td class="{{ strtolower($header) }}-column">{{Str::limit($item[strtolower($header)],300)}}</td>
                        @endforeach
                        
                        <td class="action-column">
                            <div style="display: flex; justify-content: space-between; gap: 1rem">
                                <a href="{{ route($editRoute, $item['id']) }}" class="editdeletebtn" style="cursor: pointer">
                                    <i class='bx bx-edit-alt'></i>
                                    <span>Edit</span>
                                </a>
                                <form action="{{ route($deleteRoute, $item['id']) }}" method="post" style="cursor: pointer">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="editdeletebtn">
                                        <i class='bx bx-trash-alt'></i>
                                        <span>Delete</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $records->links() }}
    @endif
</div>
