function frame_mc_slim_form() {
    ?><!-- Begin MailChimp Signup Form -->
       

        <form action="<!-- Connect To Options Panel under addons=>mailchimp quick form -->" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
            <div class="input-group">
              <input type="email" value="" name="EMAIL" class="form-control" id="mce-EMAIL" placeholder="Subscribe To Our Fan Club" style="font-size: 12px; height: 30px; background: rgba(0,0,0,.8);" required>
              <span class="input-group-btn">
                <button class="btn btn-info" type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" type="submit" style="height: 30px; font-size: 12px;">Join</button>
              </span>
            </div><!-- /input-group -->
        </form>

<!--End mc_embed_signup-->
<?php }
