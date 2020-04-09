<?php

$d_end = strtotime($opportunities['date_end']);
$d_diff = floor((time() - $d_end) / 60 / 60 / 24);
$d_diff = $d_diff < 0 ? 0 : $d_diff;

$ifUserIsActivated = ifUserIsActivated();

?>
<div class="card opportunity <?php echo $opportunities['price'] === "5000" && $passed === 0 ? "opportunity-bonus" : ""; ?>">
    <div class="card-body">

        <?php
        if ($passed || $opportunities['units_total'] <= $opportunities['units_sold']) {
            echo '<p><span class="badge badge-light p-2">Closed opportunity</span></p>';
        } else {
            echo $opportunities['price'] === "5000"
                ? '<p><span class="badge badge-danger p-2">Special opportunity</span></p>'
                : "";
        }
        ?>
        <h4 class="card-title">
            <?php echo $opportunities['name']; ?>
        </h4>
        <p class="lead">
            <span class="text-success font-weight-bold"><?php echo $opportunities['interest']; ?> %</span> returns
            in <?php echo ceil($opportunities['duration'] / 7); ?> weeks
        </p>
        <div class="row info">
            <div class="col-12 col-lg-6 mb-2">
                <p>&#x20A6;<?php echo addComma($opportunities['price']); ?></p>
                <p>per unit</p>
            </div>
            <div class="col-12 col-lg-6 mb-2">
                <p><?php echo $opportunities['investors']; ?></p>
                <p>investor<?php echo $opportunities['investors'] > 1 ? "s" : "";  ?></p>
            </div>

            <?php
            if ($passed || $opportunities['units_total'] <= $opportunities['units_sold']) {
                echo '<div class="col-12 col-lg-6 mb-2 mb-lg-0">
                <p>' . date("d F Y", strtotime($opportunities["date_start"])) . '</p>
                <p>date started</p>
            </div>
            <div class="col-12 col-lg-6">
                <p>' . date("d F Y", strtotime($opportunities["date_end"])) . '</p>
                <p>date ended</p>
            </div>';
            } else {
                echo '<div class="col-12 col-lg-6 mb-2 mb-lg-0">
                <p>' . ($opportunities["units_total"] - $opportunities["units_sold"]) . '</p>
                <p>units available</p>
            </div>
            <div class="col-12 col-lg-6">
                <p>' . $opportunities["units_sold"] . '</p>
                <p>units bought</p>
            </div>';
            }
            ?>
        </div>

        <?php

        echo '<button class="btn btn-white mr-2" data-target="#opportunityModal' . $opportunities["id"] . '" data-toggle="modal"><i class="fas fa-info"></i> Info</button>';

        if ($isAdmin) {
            intval($opportunities['units_sold']) === 0 && (time() > strtotime($opportunities['date_end']) || time() < strtotime($opportunities['date_start'])) ? include "admin/opportunity_action_button.view.php" : "";
        } else {
            $passed || ($opportunities['units_total'] <= $opportunities['units_sold']) ? "" : include "opportunity_action_button.view.php";
        }

        ?>




    </div>
</div>

<!-- Info Modal -->

<div class="modal fade opportunity-modal" id="opportunityModal<?php echo $opportunities['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="opportunityModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title text-uppercase font-weight-bold text-success">
                    opportunity
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-0">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-12 img-holder img-holder-opportunity">
                                    <img src="./img/Jumbo/jumbo.png" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" />
                                </div>
                                <div class="col-12 my-3">
                                    <small class="font-weight-bold text-white text-uppercase p-1 bg-success">Verified
                                        Opportunity</small>
                                    <div class="row my-3">
                                        <div class="col-8">
                                            <h5 class="mb-0">
                                                <?php echo $opportunities['name']; ?>
                                            </h5>
                                            <small><?php echo $opportunities['partner']; ?></small>
                                        </div>
                                        <div class="col text-right">
                                            <div class="mb-0 text-success font-weight-bold">
                                                &#x20A6;<?php echo addComma($opportunities['price']); ?>
                                            </div>
                                            <small>/ unit</small>
                                        </div>
                                    </div>

                                    <?php echo $isAdmin ? "" : '<form class="my-3">
                                        <button class="btn btn-success w-100 mb-2"
                                            data-target="#unitsModal' . $opportunities['id'] . '"
                                    data-toggle="modal" type="button">
                                    Invest Now
                                    </button>
                                    </form>'; ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <h6 class="text-uppercase font-weight-bold">
                                about
                            </h6>
                            <?php echo $opportunities['info']; ?>
                        </div>
                        <div class="col-12 mb-3">
                            <h6 class="text-uppercase font-weight-bold">
                                more info
                            </h6>
                            <div class="card-columns card-columns--2">
                                <div class="card">
                                    <div class="card-header">
                                        <small>Expected returns</small>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text"><?php echo $opportunities['interest']; ?>% in
                                            <?php echo ceil($opportunities['duration'] / 7); ?> weeks</p>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <small>Investment Type</small>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">Fixed Income</p>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <small>Current Value/Unit</small>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">
                                            &#x20A6;<?php echo addComma($opportunities['price']); ?> per unit
                                        </p>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <small>Start date</small>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">
                                            <?php echo date("d F Y", strtotime($opportunities["date_start"])); ?>

                                        </p>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <small>end date</small>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">
                                            <?php echo date("d F Y", strtotime($opportunities["date_end"])); ?>

                                        </p>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <small>Category</small>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text text-capitalize">
                                            <?php echo $opportunities["category"]; ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <small>Payout Method</small>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">
                                            Wallet
                                        </p>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <small>Partner</small>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">
                                            <?php echo $opportunities["partner"]; ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <small>Payout Method</small>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">
                                            Wallet
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Units Modal -->
<div class="modal fade" id="unitsModal<?php echo $opportunities['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="unitsModal" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title text-uppercase font-weight-bold text-success">
                    buy units
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-0">
                <div class="container">
                    <?php if (isset($_SESSION['id'])) {
                        include $ifUserIsActivated === 0 ? "opportunity_activate.view.php" : "opportunity_pay.view.php";
                    } else {
                        include "opportunity_pay_alert.view.php";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $isAdmin ? include "admin/opportunity_edit.view.php" : ""; ?>

</div>