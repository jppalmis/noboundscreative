<?php foreach( $RequestDetails as $RD):?>
    <h4 class="text-light-blue">Business Name</h4> <?php echo $RD['business_name']."<hr>";?>
    <h4 class="text-light-blue">Business Email</h4> <?php echo $RD['business_email']."<hr>";?>
    <h4 class="text-light-blue">What do you do?</h4> <?php echo $RD['what_do_they_do']."<hr>";?>
    <h4 class="text-light-blue">Target Customers</h4> <?php echo $RD['target_customers']."<hr>";?>
    <h4 class="text-light-blue">Why should they buy your product/service rather than from a competitor?</h4> <?php echo $RD['product_services_reason']."<hr>";?>
    <h4 class="text-light-blue">How can they pay you?</h4> <?php echo $RD['payment_method']."<hr>";?>
    <h4 class="text-light-blue">Help Needed?</h4> <?php echo $RD['help_needed']."<hr>";?>
    <h4 class="text-light-blue">Requested at</h4> <?php echo $RD['created_at']."<hr>";?>

    <?php if(!empty($RD['updated_at'])):?>
        <h4 class="text-light-blue">Last edited</h4> <?php echo $RD['updated_at']."<hr>";?>
    <?php endif;?>
    
    <!-- VISIBLE ON ADMIN ONLY -->
    <h4 class="text-light-blue">IP Address</h4> <?php echo $RD['ip_address']."<hr>";?>
    <h4 class="text-light-blue">Location</h4> <?php echo $RD['location']."<hr>";?>
    <h4 class="text-light-blue">User agent</h4> <?php echo $RD['user_agent']."<hr>";?>
<?php endforeach;?>