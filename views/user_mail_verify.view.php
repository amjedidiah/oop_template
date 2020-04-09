<div class="card info  py-3 px-3 shadow-sm bg-white">
    <div class="card-body ">
        <i class="far fa-envelope fa-3x mb-4"></i>
        <h5>Email Verification</h5>
        <p>
            Open the link we sent to your email address to verify your email
            <br /><strong>Also check your SPAM/JUNK folder</strong>
        </p>
        <form action="resend_mail.action.php" method="post" direction="">
            <button class="btn btn-outline-success m-2" type="submit">
                Resend Link
            </button>
            <div class="form-error"></div>
        </form>
    </div>
</div>