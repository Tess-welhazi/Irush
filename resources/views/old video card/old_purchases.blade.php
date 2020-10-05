<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="page-header">
            <h3>My Videos</h3>
        </div>
        @forelse ($myPurchases as $myPurchase)
            <div class="card card-default">
                <div class="card-header">
                    {{ $myPurchase->title }}
                </div>

                <div class="card-body">
                    {{ $myPurchase->description }}
                </div>

                    <div class="card-footer">
                        <favorite
                            :video={{ $myPurchase->id }}
                            :favorited={{ $myPurchase->favorited() ? 'true' : 'false' }}
                        ></favorite>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                          <a class="btn btn-info" href="{{  URL::signedRoute(
                            'download', ['id'=>$myPurchase->id, ]) }}">
                            download</a>

                        </div>


                    </div>

            </div>
</div> </div>
