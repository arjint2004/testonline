<div class="row">
<!-- left column -->
<div class="col-md-12">
<?php echo ($this->session->flashdata('error')) ? error_msg($this->session->flashdata('error')) : ''; ?>
<?php echo ($this->session->flashdata('success')) ? success_msg($this->session->flashdata('success')) : ''; ?>
<h4>Exam :: <?php  echo $exam->name; ?></h4>
<div class="box box-info">
<div class="box-body">
<div class="row">
<div class="col-md-12">
    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#questions" data-toggle="tab">Questions</a></li>
            <li><a href="#add" data-toggle="tab">Add Question</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="questions">
	            <table class="table table-bordered table-striped table-hover">
		            <thead>
		            <tr>
		                <th style="width: 2%"></th>
		                <th style="width: 30%">Question</th>
		                <th style="width: 10%">marks</th>
		                <th style="width: 20%">Action</th>
		            </tr>
		            </thead>
		            <?php 
		            	if(!empty($exam)) { 
		                $count = 1;
		            	foreach ($exam->question as $question) {?>
		            	<tr>
		                <td><?php echo $count; ?>.</td>
		                <td><?php echo $question->question; ?></td>
		                <td><?php echo $question->marks; ?></td>
		                <td>
		                    <?php echo view_btn('admin/questions/view/'.$question->id); ?>
		                    <?php echo edit_btn('admin/questions/edit/'.$question->id); ?>
		                    <?php echo delete_btn('admin/questions/delete/'.$question->id); ?>
		                </td>
		            	</tr>
		            <?php		$count++;	# code...
		            		}
		            	} ?>
	        	</table>
            </div><!-- /.tab-pane -->
            <div class="tab-pane" id="add">
	            	<?php 
	            		echo form_open_multipart($form_action);  
	            		echo form_hidden('exam_id', $exam->id);
	            	?>
            		<div class="row">
			            <div class="form-group col-xs-6">
			                <label>Question</label>
			                <textarea class="form-control required" id="exameditoradd1" rows="10" name="question"></textarea>
									<script type="text/javascript">
										//<![CDATA[
										

										var editor =CKEDITOR.replace( 'exameditoradd1',{skin : 'office2003'});
										CKFinder.setupCKEditor( editor, '<?=base_url()?>assets/js/ckfinder/' ) ;
											 //CKFinder.SetupCKEditor( editor, { BasePath : "assets/js/ckfinder/", RememberLastFolder : false } ) ;
										//]]>
									</script>
			            </div>
			            <div class="form-group col-xs-6">
			                <label>Marks</label>
			                <input type="text" class="form-control required digits" name="marks" value="" />
			            </div>
			            <div class="form-group col-xs-6">
			                <label>Image</label>
			                <input type="file" class="form-control" name="que_img" />
			            </div>
			        </div>
			        <h4>Answers</h4><hr>
			        <div class="row">
			            <div class="form-group col-xs-6">
			                <label>Answer</label>
			                <textarea  id="exameditoradd12" class="form-control  required" rows="5" name="answer-1"></textarea>
									<script type="text/javascript">
										//<![CDATA[
										var editor =CKEDITOR.replace( 'exameditoradd12',{skin : 'office2003'});
										CKFinder.setupCKEditor( editor, '<?=base_url()?>assets/js/ckfinder/' ) ;
											 //CKFinder.SetupCKEditor( editor, { BasePath : "assets/js/ckfinder/", RememberLastFolder : false } ) ;
										//]]>
									</script>
			            </div>
			            <div class="form-group col-xs-3" style="padding-top: 80px;"> 
			                <label>Correct</label>
			                <select class="form-control required" name="correct-1" >
			                	<option value="1">Yes</option>
			                	<option value="0">No</option>
			                </select>
			            </div>
			        </div>
			        <div class="row">
			            <div class="form-group col-xs-6">
			                <label>Answer</label>
			                <textarea class="form-control  required" id="exameditoradd13" rows="5" name="answer-2"></textarea>
									<script type="text/javascript">
										//<![CDATA[
										var editor =CKEDITOR.replace( 'exameditoradd13',{skin : 'office2003'});
										CKFinder.setupCKEditor( editor, '<?=base_url()?>assets/js/ckfinder/' ) ;
											 //CKFinder.SetupCKEditor( editor, { BasePath : "assets/js/ckfinder/", RememberLastFolder : false } ) ;
										//]]>
									</script>
			            </div>
			            <div class="form-group col-xs-3" style="padding-top: 80px;"> 
			                <label>Correct</label>
			                <select class="form-control required" name="correct-2">
			                	<option value="1">Yes</option>
			                	<option value="0">No</option>
			                </select>
			            </div>
			        </div>
			        <div class="row">
			            <div class="form-group col-xs-6">
			                <label>Answer</label>
			                <textarea class="form-control  required" id="exameditoradd14" rows="5" name="answer-3"></textarea>

									<script type="text/javascript">
										//<![CDATA[
										var editor =CKEDITOR.replace( 'exameditoradd14',{skin : 'office2003'});
										CKFinder.setupCKEditor( editor, '<?=base_url()?>assets/js/ckfinder/' ) ;
											 //CKFinder.SetupCKEditor( editor, { BasePath : "assets/js/ckfinder/", RememberLastFolder : false } ) ;
										//]]>
									</script>							
			            </div>
			            <div class="form-group col-xs-3" style="padding-top: 80px;"> 
			                <label>Correct</label>
			                <select class="form-control required" name="correct-3">
			                	<option value="1">Yes</option>
			                	<option value="0">No</option>
			                </select>
			            </div>
			        </div>
			        <div class="row">
			            <div class="form-group col-xs-6">
			                <label>Answer</label>
			                <textarea id="exameditoradd15" class="form-control  required" rows="5" name="answer-4"></textarea>
									<script type="text/javascript">
										//<![CDATA[
										var editor =CKEDITOR.replace( 'exameditoradd15',{skin : 'office2003'});
										CKFinder.setupCKEditor( editor, '<?=base_url()?>assets/js/ckfinder/' ) ;
											 //CKFinder.SetupCKEditor( editor, { BasePath : "assets/js/ckfinder/", RememberLastFolder : false } ) ;
										//]]>
									</script>								
			            </div>
			            <div class="form-group col-xs-3" style="padding-top: 80px;"> 
			                <label>Correct</label>
			                <select class="form-control required" name="correct-4">
			                	<option value="1">Yes</option>
			                	<option value="0">No</option>
			                </select>
			            </div>
			        </div>
			        <div class="box-footer clearfix">
						<div class="form-group col-xs-12">
		                <button type="submit" class="btn btn-primary  pull-right">Submit</button>
		            </div>
		            </div>
			        </form>
            </div><!-- /.tab-pane -->

        </div><!-- /.tab-content -->
    </div><!-- nav-tabs-custom -->
</div><!-- /.col -->
</div>
    </div><!-- /.box-body -->
</div><!-- /.box -->
</div>
</div>