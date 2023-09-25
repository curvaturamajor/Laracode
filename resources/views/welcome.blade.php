<table border="1">
<thead>
    <tr>
        <th><a href="{{ route('index', ['order_by' => 'sid', 'direction' => ($order_by == 'sid' && $direction == 'asc') ? 'desc' : 'asc']) }}">No</a></th>
        <th><a href="{{ route('index', ['order_by' => 'fname', 'direction' => ($order_by == 'fname' && $direction == 'asc') ? 'desc' : 'asc']) }}">Adı</a></th>
        <th><a href="{{ route('index', ['order_by' => 'lname', 'direction' => ($order_by == 'lname' && $direction == 'asc') ? 'desc' : 'asc']) }}">Soyadı</a></th>
        <th><a href="{{ route('index', ['order_by' => 'birthplace', 'direction' => ($order_by == 'birthplace' && $direction == 'asc') ? 'desc' : 'asc']) }}">Doğum Yeri</a></th>
        <th><a href="{{ route('index', ['order_by' => 'birthDate', 'direction' => ($order_by == 'birthDate' && $direction == 'asc') ? 'desc' : 'asc']) }}">Doğum tarihi</a></th>
    </tr>
</thead>

    <tbody>
        @foreach ($students as $student)
            <tr>
                <td>{{ $student->sid }}</td>
                <td>{{ $student->fname }}</td>
                <td>{{ $student->lname }}</td>
                <td>{{ $student->birthplace }}</td>
                <td>{{ $student->birthDate }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<div>
    {{ $students->appends(['order_by' => $order_by, 'direction' => $direction])->onEachSide(3)->links() }}
</div>