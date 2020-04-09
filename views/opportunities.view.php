<!-- ?Jumbotron -->
<div class="jumbotron jumbotron-fluid bg-white py-5 mt-0">
    <div class="container py-5">
        <h1 class="display-4 pt-5" id="headerDet">Opportunity</h1>
        <p class="lead">Numerous opportunities to take advantage of</p>
    </div>
</div>

<div class="container pb-5">
    <div class="row">
        <div class="col-12 col-lg-3 filters d-lg-block">
            <div class="row shadow-sm filter bg-light">
                <div class="col">
                    <small class="title">Category</small>
                    <div class="filter-list filter-list-category">
                        <div class="filter-item opportunity-filter pointer" data-filter="agriculture">
                            <i class="fas fa-tractor"></i> Agriculture
                        </div>
                        <div class="filter-item opportunity-filter pointer" data-filter="real_estate">
                            <i class="fas fa-building"></i> Real Estate
                        </div>
                        <div class="filter-item opportunity-filter pointer" data-filter="transportation">
                            <i class="fas fa-shuttle-van"></i>
                            Transportation
                        </div>
                    </div>
                </div>
            </div>
            <div class="row shadow-sm filter bg-light">
                <div class="col">
                    <small class="title">Duration</small>
                    <div class="filter-list filter-list-duration">
                        <div class="filter-item opportunity-filter pointer" data-filter="long">
                            <i class="fa fa-hourglass" aria-hidden="true"></i>
                            Long-term
                        </div>
                        <div class="filter-item opportunity-filter pointer" data-filter="short">
                            <i class="fas fa-stopwatch" aria-hidden="true"></i>
                            Short-term
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col offset-lg-1">
            <input type="text" id="opportunityMarker" style="opacity: 0" />
            <div class="card-columns" id="opportunitiesDiv">
            </div>
        </div>
    </div>
</div>