<div class="row">
        <div class="col-xs-12">
            <label>Queestion</label>
            <div class="text-muted well well-sm" style="margin-top: 10px;">
               <?php echo (isset($question)) ? $question->question : ''; ?>
            </div>
             <label>marks</label>
                <div class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                   <?php echo (isset($question)) ? $question->marks : ''; ?>
                </div>
            <label>Image</label>
                <div class="text-muted no-shadow" style="margin-top: 10px;">
                   <?php echo (isset($question) && $question->image != '') ?  img(base_url().$question->image) : ''; ?>
                </div>
            <?php if($question->answer){ ?>
            <h4>Answers</h4>
            <?php $count= 1; foreach ($question->answer as $answer) { ?>
              <label>Answer <?php echo $count; ?> | correct : <?php echo ($answer->correct == 1) ? '<span class="label label-success"> YES </span>' : '<span class="label label-danger">NO</span>'; ?></label>
              <div class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                 <?php echo $answer->answer; ?>
              </div>
            <?php $count++; }} ?>
        </div>  
</div>