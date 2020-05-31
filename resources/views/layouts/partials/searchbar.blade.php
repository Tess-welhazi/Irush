
<!-- <div class="searcher input-group md-form form-sm form-2 pl-0">
  <input class="form-control my-0 py-1 lime-border" type="text" placeholder="Search" aria-label="Search">
  <div class="input-group-append">
    <span class="input-group-text lime lighten-2" id="basic-text1"><i class="fas fa-search text-grey"
        aria-hidden="true"></i></span>
  </div>
</div> -->

<form action="/search" method="POST" role="search" class="searcher input-group md-form form-sm form-2 pl-0">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control my-0 py-1 lime-border" name="q" aria-label="Search" placeholder="Search users">
         <span class="input-group-btn lime lighten-2">
            <button type="submit" class="btn btn-default">
                <span class="fas fa-search text-grey"></span>
            </button>
        </span>
    </div>
</form>
