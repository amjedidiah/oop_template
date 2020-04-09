<!-- Opportunity Edit Modal -->
<div class="modal fade opportunity-edit-modal" id="opportunityEditModal<?php echo $opportunities['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="unitsModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title text-uppercase font-weight-bold text-success">
                    edit opportunity
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-0">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <?php include("opportunity_admin_form.view.php"); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>