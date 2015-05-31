<div class="row">
    <div class="row">
        <div class="col-xs-12">
            <div class="form-group col-xs-12">
                <label>Name</label>
                <p class="text-muted well well-sm" style="margin-top: 10px;">
                   <?php echo (isset($category)) ? $category->name : ''; ?>
                </p>
            </div>
             <div class="form-group col-xs-12">
                <label>Description</label>
                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                   <?php echo (isset($category)) ? $category->description : ''; ?>
                </p>
            </div>
        </div>
     </div>
</div>