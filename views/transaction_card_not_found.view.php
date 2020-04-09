<div>
    <i class="fas fa-funnel-dollar fa-10x text-success"></i>
    <hgroup>
        <h1>No Transactions Yet</h1>
        <?php echo $isAdmin ? "" : '<h5>Fund your wallet to make your first transaction</h5>';  ?>
    </hgroup>
    <?php echo $isAdmin ? "" : '<div class="my-2">
        <a href="./user?action=wallet_fund" class="text-success">Fund Wallet</a>
    </div>';  ?>
</div>