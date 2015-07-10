

          <select data-placeholder="Your Favorite Types of Bear" style="width:350px;" id="shareexam" multiple class="chosen-select" tabindex="8">
          <option>American Black Bear</option>
          <option>American Black Bear</option>
          <option>American Black Bear</option>
          <option>American Black Bear</option>
          <option>American Black Bear</option>
		  </select>
		
	  <script type="text/javascript">
		var config = {
		  '.chosen-select'           : {},
		  '.chosen-select-deselect'  : {allow_single_deselect:true},
		  '.chosen-select-no-single' : {disable_search_threshold:10},
		  '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
		  '.chosen-select-width'     : {width:"95%"}
		}
		for (var selector in config) {
		  $(selector).chosen(config[selector]);
		}
	  </script>
	  <script>
			/*$(document).ready(function(){	  
				var obinput=$('select#shareexam').next('div').children('ul.chosen-choices').children('li').last().children('input');
				
				$(obinput).keyup(function(){
					var q=$(this).val();
					
					if(q.length>3){
						var obj=$(this);
						$.ajax({
							type: "POST",
							data: 'q='+$(obj).val(),
							url: '<?=base_url()?>admin/exams/searchmember/'+$(obj).val(),
							beforeSend: function() {
								
							},
							success: function(msg) {
								var obdrop=$(obj).parent('li').parent('ul').next('div').children('ul').append(msg);
								
								var config = {
								  '.chosen-select'           : {},
								  '.chosen-select-deselect'  : {allow_single_deselect:true},
								  '.chosen-select-no-single' : {disable_search_threshold:10},
								  '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
								  '.chosen-select-width'     : {width:"95%"}
								}								
								for (var selector in config) {
								  $(selector).chosen(config[selector]);
								}
							}
						});						
					}

						return false;
				});
			});*/
	  </script>