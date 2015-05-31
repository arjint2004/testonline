<div class="row">
        <div class="col-xs-6">
            <label>Name</label>
            <div class="text-muted well well-sm" style="margin-top: 10px;">
               <?php echo (isset($exam)) ? $exam->name : ''; ?>
            </div>
             <label>Description</label>
                <div class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                   <?php echo (isset($exam)) ? $exam->description : ''; ?>
                </div>
            <label>Category</label>
                <div class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                   <?php echo (isset($exam)) ? $exam->category->name : ''; ?>
                </div>
            <label>Available From</label>
                <div class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                   <?php echo (isset($exam)) ? format_date($exam->available_from) : ''; ?>
                </div>
            <label>Available To</label>
                <div class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                   <?php echo (isset($exam)) ? format_date($exam->available_to) : ''; ?>
                </div>
        
        </div>
        <div class="col-xs-6">
             <label>Duration</label>
                <div class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                   <?php echo (isset($exam)) ? $exam->duration .' Minutes' : ''; ?>
                </div>
            <label>Question</label>
                <div class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                   <?php echo (isset($exam)) ? $exam->questions : ''; ?>
                </div>
            <label>Pass Mark</label>
                <div class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                   <?php echo (isset($exam)) ? $exam->pass_mark.' %' : ''; ?>
                </div>
            <label>Type</label>
                <div class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                   <?php echo (isset($exam)) ? $exam->type : ''; ?>
                </div>
            <label>Status</label>
                <div class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                   <?php echo (isset($exam)) ? exam_status($exam->active) : ''; ?>
                </div>

        </div>
</div>