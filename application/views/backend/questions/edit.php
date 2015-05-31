<div class="row">
    <!-- left column -->
    <div class="col-md-12">
		<?php 
    		echo form_open_multipart($form_action);  
    		echo form_hidden('question_id', $question->id);
    	?>
    	<div class="box box-primary">
    		<div class="box-body">
		<div class="row">
            <div class="form-group col-xs-6">
                <label>Question</label>
                <textarea class="form-control editor required" rows="10" name="question"><?php echo $question->question; ?></textarea>
            </div>
            <div class="form-group col-xs-6">
                <label>Marks</label>
                <input type="text" class="form-control required digits" name="marks" value="<?php echo $question->marks; ?>" />
            </div>
            <div class="form-group col-xs-6">
                <label>Image</label> <br>
                <?php echo (isset($question) && $question->image != '') ?  img(base_url().$question->image) : ''; ?>
                <input type="file" class="form-control" name="que_img" />
            </div>
        </div>

        <?php if($question->answer){ ?>
        <h4>Answers</h4><hr>
        <?php $count = 1; foreach ($question->answer as $answer) { ?>
        	<div class="row">
            <div class="form-group col-xs-6">
            	<?php echo form_hidden('answer_id-'.$count, $answer->id); ?>
                <label>Answer</label>
                <textarea class="form-control editor required" rows="5" name="answer-<?php echo $count; ?>"><?php echo  $answer->answer; ?></textarea>
            </div>
            <div class="form-group col-xs-3" style="padding-top: 80px;"> 
                <label>Correct</label>
                <select class="form-control required" name="correct-<?php echo $count; ?>" >
                	<option value="1" <?php echo ($answer->correct == 1) ? 'selected' : ''; ?>>Yes</option>
                	<option value="0" <?php echo ($answer->correct == 0) ? 'selected' : ''; ?>>No</option>
                </select>
            </div>
        	</div>
        <?php $count++; } } ?>
    </div>
        <div class="box-footer clearfix">
			<div class="form-group col-xs-12">
            <button type="submit" class="btn btn-primary  pull-right">Submit</button>
        </div>
        </div>
        </form>
	</div>
	</div>
</div>