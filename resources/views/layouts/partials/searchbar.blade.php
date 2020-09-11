
<form action="/search" method="POST" role="search" class="searcher input-group md-form form-sm form-2 pl-0">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control my-0 py-1 lime-border" name="q" aria-label="Search" placeholder="Search video">
         <span class="input-group-btn lime lighten-2">
            <button type="submit" class="btn btn-default">
                <span class="fas fa-search text-grey"></span>
            </button>
        </span>
    </div>
</form>
