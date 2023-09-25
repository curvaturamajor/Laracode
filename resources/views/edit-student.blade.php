
<div class="container">
    <h2>Öğrenci Bilgilerini Güncelle</h2>

    <form action="{{ route('update-student', $student->sid) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="fname" class="form-label">Adı</label>
            <input type="text" class="form-control" id="fname" name="fname" value="{{ $student->fname }}" required>
        </div>
        
        <div class="mb-3">
            <label for="lname" class="form-label">Soyadı</label>
            <input type="text" class="form-control" id="lname" name="lname" value="{{ $student->lname }}" required>
        </div>

        <div class="mb-3">
            <label for="birthplace" class="form-label">Doğum Yeri</label>
            <input type="text" class="form-control" id="birthplace" name="birthplace" value="{{ $student->birthplace }}" required>
        </div>

        <div class="mb-3">
            <label for="birthDate" class="form-label">Doğum Tarihi</label>
            <input type="date" class="form-control" id="birthDate" name="birthDate" value="{{ $student->birthDate }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Değişiklikleri Kaydet</button>
    </form>
</div>
