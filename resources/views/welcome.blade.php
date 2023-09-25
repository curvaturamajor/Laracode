<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<table border="1" class= "col-6">
<thead>
    <tr>
        <th><a href="{{ route('index', ['order_by' => 'sid', 'direction' => ($order_by == 'sid' && $direction == 'asc') ? 'desc' : 'asc', 'page' => $students->currentPage() ]) }}">No</a></th>
        <th><a href="{{ route('index', ['order_by' => 'fname', 'direction' => ($order_by == 'fname' && $direction == 'asc') ? 'desc' : 'asc', 'page' => $students->currentPage()]) }}">Adı</a></th>
        <th><a href="{{ route('index', ['order_by' => 'lname', 'direction' => ($order_by == 'lname' && $direction == 'asc') ? 'desc' : 'asc', 'page' => $students->currentPage()]) }}">Soyadı</a></th>
        <th><a href="{{ route('index', ['order_by' => 'birthplace', 'direction' => ($order_by == 'birthplace' && $direction == 'asc') ? 'desc' : 'asc', 'page' => $students->currentPage()]) }}">Doğum Yeri</a></th>
        <th><a href="{{ route('index', ['order_by' => 'birthDate', 'direction' => ($order_by == 'birthDate' && $direction == 'asc') ? 'desc' : 'asc', 'page' => $students->currentPage()]) }}">Doğum tarihi</a></th>
        <th><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStudentModal">Oluştur</button></th>
        <th></th>
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
            <td>
                <div class="d-inline-block">
                    <!-- Güncelle Butonu -->
                    <a href="{{ route('edit-student', $student->sid) }}" class="btn btn-warning btn-sm">Güncelle</a>
                </div>
                <div class="d-inline-block">
                    <!-- Sil Butonu -->
                    <form action="{{ route('delete-student', $student->sid) }}" method="POST" onsubmit="return confirm('Bu öğrenciyi silmek istediğinizden emin misiniz?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Sil</button>
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
</tbody>


</table>

<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
    <a class="btn page-item btn-outline-primary" href="{{ $students->appends(['order_by' => $order_by, 'direction' => $direction])->url(1) }}"><<</a>

    <a class="btn page-item btn-outline-primary" href="{{ $students->appends(['order_by' => $order_by, 'direction' => $direction])->previousPageUrl() }}"><</a>

    @foreach(range(1, $students->lastPage()) as $i)
        @if($i >= $students->currentPage() - 3 && $i <= $students->currentPage() + 3)
            <a class="btn page-item btn-outline-primary @if($students->currentPage() == $i) active @endif" href="{{ $students->appends(['order_by' => $order_by, 'direction' => $direction])->url($i) }}">{{ $i }}</a>
        @endif
    @endforeach

    <a class="btn page-item btn-outline-primary" href="{{ $students->appends(['order_by' => $order_by, 'direction' => $direction])->nextPageUrl() }}">></a>

    <a class="btn page-item btn-outline-primary" href="{{ $students->appends(['order_by' => $order_by, 'direction' => $direction])->url($students->lastPage()) }}">>></a>
</div>
<!-- Add Student Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addStudentModalLabel">Yeni Öğrenci Ekle</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('add-student') }}" method="post">
            @csrf
            <div class="mb-1 col-5">
        <label for="fname" class="form-label">Adı</label>
        <input type="text" class="form-control" id="fname" name="fname" required>
    </div>
    <div class="mb-1 col-5">
        <label for="lname" class="form-label">Soyadı</label>
        <input type="text" class="form-control" id="lname" name="lname" required>
    </div>
    <div class="mb-1 col-5">
        <label for="birthplace" class="form-label">Doğum Yeri</label>
        <input type="text" class="form-control" id="birthplace" name="birthplace" required>
    </div>
    <div class="mb-1 col-5">
        <label for="birthDate" class="form-label">Doğum Tarihi</label>
        <input type="date" class="form-control" id="birthDate" name="birthDate" required>
    </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                <button type="submit" class="btn btn-primary">Ekle</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!--
<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
    <a class="btn page-item btn-outline-primary" href="{{ $students->appends(['order_by' => $order_by, 'direction' => $direction])->url(1) }}"><<</a>
    {{ $students->appends(['order_by' => $order_by, 'direction' => $direction])->onEachSide(3)->links() }}
    <a class="btn page-item btn-outline-primary" href="{{ $students->appends(['order_by' => $order_by, 'direction' => $direction])->url($students->lastPage()) }}">>></a>
</div>
-->