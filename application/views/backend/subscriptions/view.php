<div class="row">
        <div class="col-xs-12">
            <label>Name</label>
            <div class="text-muted well well-sm" style="margin-top: 10px;">
               <?php echo (isset($subscription)) ? $subscription->user->username : ''; ?>
            </div>
             <label>Description</label>
                <div class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                   <?php echo (isset($subscription)) ? $subscription->exam->name : ''; ?>
                </div>
            <label>Category</label>
                <div class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                   <?php echo (isset($subscription)) ? $subscription->amount : ''; ?>
                </div>
            <label>Available From</label>
                <div class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                   <?php echo (isset($subscription)) ? format_date($subscription->created_at) : ''; ?>
                </div>
        </div>
</div>