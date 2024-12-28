<div class="contact-from-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="form-title">
                    <h2>Have you any question?</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, ratione! Laboriosam est, assumenda. Perferendis, quo alias quaerat aliquid. Corporis ipsum minus voluptate? Dolore, esse natus!</p>
                </div>
                <div id="form_status"></div>
                <div class="contact-form">
                    <form method="POST" id="fruits-contact" class="contact-form">
                        <?php wp_nonce_field( 'contact_form_submit', 'contact_nonce' ); ?>
                        <p>
                            <input type="text" placeholder="Name" name="contact_name" id="name" required
                                pattern="[A-Za-z\s]+" title="Please enter a valid name">
                            <input type="email" placeholder="Email" name="contact_email" id="email" required>
                        </p>
                        <p>
                            <input type="tel" placeholder="Phone" name="contact_phone" id="phone" required
                                pattern="[0-9+\s-]{10,}" title="Please enter a valid phone number">
                            <input type="text" placeholder="Subject" name="contact_subject" id="subject" required>
                        </p>
                        <p>
                            <textarea name="contact_message" id="message" cols="30" rows="10"
                                placeholder="Message" required minlength="10"></textarea>
                        </p>
                        <div id="form_status"></div>
                        <p><input type="submit" value="Submit"></p>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="contact-form-wrap">
                    <div class="contact-form-box">
                        <h4><i class="fas fa-map"></i> Shop Address</h4>
                        <p>Varna, <br> Bulgaria</p>
                    </div>
                    <div class="contact-form-box">
                        <h4><i class="far fa-clock"></i> Shop Hours</h4>
                        <p>Mon - Friday: 8:00 to 19:00 H<br> Sat - Sun: 10:00 to 17:00 H </p>
                    </div>
                    <div class="contact-form-box">
                        <h4><i class="fas fa-address-book"></i> Contact</h4>
                        <p>Phone: +359 88 222 3333 <br> Email: fruits2024@abv.bg</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>