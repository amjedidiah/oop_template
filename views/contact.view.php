<!-- ?Jumbo -->
<div class="jumbotron jumbotron-fluid bg-white py-5 mt-0">
    <div class="container py-5">
        <h1 class="display-4 pt-5" id="headerDet">Get In Touch</h1>
        <p class="lead">Drop us a line and we will get back to you shortly</p>
    </div>
</div>

<!-- ?Contact Form -->
<div id="contactForm" class="container shadow bg-success">
    <div class="row align-items-center">
        <div class="col-12 col-xl-6 p-5 bg-white">
            <form class="form" method="post" action="contact.action.php" direction="">
                <div class="form-row mb-3 justify-content-between">
                    <div class="col-12 col-md-5">
                        <div class="form-group">
                            <label class="text-success" for="contactFirstName">First Name</label>
                            <input type="text" class="form-control" name="name" id="contactFirstName" placeholder="e.g: Clement" required />
                        </div>
                    </div>
                    <div class="col-12 col-md-5">
                        <div class="form-group">
                            <label class="text-success" for="contactLastName">Last Name</label>
                            <input type="text" class="form-control" name="" id="contactLastName" aria-describedby="contactLastName" placeholder="e.g: Obi" required />
                        </div>
                    </div>
                </div>
                <div class="form-row mb-3 justify-content-between">
                    <div class="col-12 col-md-5">
                        <div class="form-group">
                            <label class="text-success" for="contactPhone">Mobile Number</label>
                            <input type="tel" id="contactPhone" name="tel" class="form-control" placeholder="e.g: +2348165736665" required />
                        </div>
                    </div>
                    <div class="col-12 col-md-5">
                        <div class="form-group">
                            <label class="text-success" for="contactEmail">Email Address</label>
                            <input type="email" id="contactEmail" name="email" class="form-control" placeholder="e.g: enochmartinsemeka@gmail.com" required />
                        </div>
                    </div>
                </div>
                <div class="form-row mb-3 justify-content-between">
                    <div class="col">
                        <div class="form-group">
                            <label class="text-success" for="contactMessage">Message</label>
                            <textarea id="contactMessage" class="form-control" placeholder="Enter message here" rows="5" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-error"></div>
                <button class="btn btn-success btn-lg mt-3 float-right p-3" type="submit">
                    <i class="far fa-paper-plane"></i> Send
                </button>
            </form>
        </div>
        <div class="col-12 col-xl-6 order-first order-xl-last bg-success text-white p-5">
            <h1>Contact Information</h1>
            <div class="py-4" style="font-weight: 200 !important">
                <!-- <h4 class="py-1">
                    <i class="fas fa-map-marker-alt mr-3"></i>
                    91 Ama Road Kenya
                </h4> -->
                <h4 class="py-1">
                    <i class="fas fa-envelope mr-3"></i>
                    hello@weekvest.com
                </h4>
                <!-- <h4 class="py-1">
                    <i class="fas fa-mobile-alt mr-3"></i>
                    +234 (908) 636 3687
                </h4> -->
            </div>
            <!-- <h4>
                <i class="fab fa-twitter mr-3" aria-hidden="true"></i>
                <i class="fab fa-linkedin mr-3" aria-hidden="true"></i>
                <i class="fab fa-instagram mr-3" aria-hidden="true"></i>
            </h4> -->
        </div>
    </div>
</div>