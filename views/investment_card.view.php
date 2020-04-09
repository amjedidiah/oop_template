<div class="card opportunity">
    <div class="card-body">
        <h4 class="card-title"><?php echo $opportunity['name'] ?></h4>
        <p class="lead">
            <span class="text-success font-weight-bold"><?php echo $opportunity['interest'] ?>%</span>
            returns in <?php echo ceil($opportunity['duration'] / 7); ?> week<?php echo ceil($opportunity['duration'] / 7) > 1 ? "s" : ""; ?>
        </p>
        <div class="row info">
            <div class="col-12 col-lg mb-2 mb-lg-0">
                <p>&#x20A6;<?php echo addComma($opportunity['price']); ?></p>
                <p>per unit</p>
            </div>
            <div class="col-12 col-lg">
                <p><?php echo $investment['units']; ?></p>
                <p>unit<?php echo $investment['units'] > 1 ? "s" : "";  ?> owned</p>
            </div>
        </div>
        <button class="btn btn-white mr-3" data-toggle="modal" data-target="#investmentModal<?php echo $investment['id']; ?>">
            <i class="fas fa-eye    "></i>
            View
        </button>
        <!-- <button class="btn btn-success text-white" data-toggle="modal"
                                    data-target="#cashOutModal">
                                    Cashout
                                </button> -->



    </div>
</div>



<!-- Info Modal -->
<div class="modal fade opportunity-modal" id="investmentModal<?php echo $investment['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="opportunityModal" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title text-uppercase font-weight-bold text-success">
                    investment
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left px-0">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-12 img-holder img-holder-opportunity">
                                    <img src="./img/Jumbo/jumbo.png" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" />
                                </div>
                                <div class="col-12 my-3">
                                    <div class="row my-3">
                                        <div class="col-8">
                                            <h5 class="mb-0">
                                                <?php echo $opportunity['name']; ?>
                                            </h5>
                                            <small>By <?php echo $opportunity['partner']; ?></small>
                                        </div>
                                    </div>

                                    <div class="my-3">
                                        <?php

                                        if (!$isAdmin && isset($ifInvestmentHasBeenReturned)) {
                                            echo  $ifInvestmentHasBeenReturned === 0 ? include("get_returns.view.php") : "";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <h6 class="text-uppercase font-weight-bold">
                                stats
                            </h6>
                            <div class="card-columns card-columns--2">
                                <div class="card">
                                    <div class="card-header">
                                        <small>units owned</small>
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-text"><?php echo $investment['units']; ?></h1>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <small>money invested</small>
                                    </div>
                                    <div class="card-body d-flex">
                                        <h1 class="card-text flex-grow-1">&#x20A6;<?php echo addComma($investment['paid']); ?>
                                        </h1>
                                        <div class="text-right pt-2">
                                            <span class="text-success font-weight-bold">
                                                @ &#x20A6;<?php echo addComma($opportunity['price']); ?>
                                            </span>
                                            <small>/ unit</small>
                                        </div>
                                    </div>

                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <small>interest gained</small>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <?php
                                            $d_start = strtotime($opportunity['date_start']);
                                            $d_end = strtotime($opportunity['date_end']);

                                            $d_counting_day = time() > $d_end ? $d_end : time();
                                            $d_diff = floor(($d_counting_day - $d_start) / 60 / 60 / 24);
                                            $d_diff = $d_diff < 0 ? 0 : $d_diff;
                                            $d_diff_p = floor($d_diff / $opportunity['duration'] * 100);
                                            $d_left = $opportunity['duration'] - $d_diff;
                                            $d_left_p = floor($d_left / $opportunity['duration'] * 100);
                                            $t = $d_diff / $opportunity['duration'];

                                            // Simple interest
                                            $i = $investment['paid'] * $opportunity['interest'] * $t / 100;  // $t is days passed / total duration

                                            $d_counting_day_total = $d_end;
                                            $d_diff_total = floor(($d_counting_day_total - $d_start) / 60 / 60 / 24);
                                            $d_diff_total = $d_diff_total < 0 ? 0 : $d_diff_total;
                                            $d_diff_p_total = floor($d_diff_total / $opportunity['duration'] * 100);
                                            $d_left_total = $opportunity['duration'] - $d_diff_total;
                                            $d_left_p_total = floor($d_left_total / $opportunity['duration'] * 100);
                                            $t_total = $d_diff_total / $opportunity['duration'];
                                            $i_total = $investment['paid'] * $opportunity['interest'] * $t_total / 100;  // $t is days passed / total duration

                                            $mat_amount = $i_total + $investment['paid'];  // $t is days passed / total duration

                                            ?>
                                            <div>
                                                <h1 class="card-text flex-grow-1">&#x20A6;
                                                    <?php echo addComma(floor($i)); ?></h1>

                                                <small class="text-muted"> Come back upon maturity to credit
                                                    <span class="text-success font-weight-bold">
                                                        <?php
                                                        echo "&#x20A6;" . addComma(floor(($mat_amount)));
                                                        ?>
                                                    </span>
                                                    to your wallet
                                                </small>
                                            </div>
                                            <div class="text-right pt-2">
                                                in <span class="text-success font-weight-bold">
                                                    <?php
                                                    echo $d_diff . "/" . $opportunity['duration'];
                                                    ?>
                                                </span>
                                                days
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <small>days completed</small>
                                    </div>
                                    <div class="card-body">
                                        <figure>
                                            <div class="figure-content">
                                                <svg width="100%" height="100%" viewBox="0 0 42 42" class="donut" aria-labelledby="beers-title beers-desc" role="img">
                                                    <title id="beers-title">
                                                        Days of investment
                                                    </title>
                                                    <desc id="beers-desc">
                                                        Donut chart showing days of
                                                        investment.
                                                    </desc>
                                                    <circle class="donut-hole" cx="21" cy="21" r="15.91549430918954" fill="#fff" role="presentation"></circle>
                                                    <circle class="donut-ring" cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#e0f1e1" stroke-width="3" role="presentation"></circle>

                                                    <circle class="donut-segment" cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#009245" stroke-width="3" stroke-dasharray="<?php echo $d_diff_p . " " . $d_left_p; ?>" stroke-dashoffset="25" aria-labelledby="donut-segment-1-title donut-segment-1-desc">
                                                        <title id="donut-segment-1-title">
                                                            Days completed
                                                        </title>
                                                        <desc id="donut-segment-1-desc">
                                                            Days completed on this investment
                                                            opportunity
                                                        </desc>
                                                    </circle>
                                                    <!-- unused 10% -->
                                                    <g class="chart-text">
                                                        <text x="50%" y="50%" class="chart-number">
                                                            <?php echo $d_diff; ?>
                                                        </text>
                                                        <text x="50%" y="50%" class="chart-label">
                                                            Day<?php echo $d_diff > 0 ? "s" : ""; ?>
                                                        </text>
                                                    </g>
                                                </svg>
                                            </div>
                                            <figcaption class="figure-key">
                                                <p class="sr-only">
                                                    Donut chart showing days of investment.
                                                </p>

                                                <ul class="figure-key-list" aria-hidden="true" role="presentation">
                                                    <li>
                                                        <span class="shape-circle shape-fuschia"></span>
                                                        <?php echo $d_left; ?>
                                                        day<?php echo $d_left > 0 ? "s" : ""; ?>
                                                        left
                                                    </li>
                                                    <li>Start Date: <span class="font-weight-light"> <?php echo date("d F Y", strtotime($opportunity["date_start"])); ?></span> </li>
                                                    <li>End Date: <span class="font-weight-light"><?php echo date("d F Y", strtotime($opportunity["date_end"])); ?></span> </li>
                                                    <li></li>
                                                </ul>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="my-3">
                            <?php
                            if (!$isAdmin && isset($ifInvestmentHasBeenReturned)) {
                                echo  $ifInvestmentHasBeenReturned === 0 ? include("get_returns.view.php") : "";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>