<div class="row">
<div class="col-md-12">
           <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="<?php echo site_url('assets/img/doctype-hi-res.jpg'); ?>" alt="First slide">
                    </div>
                    <div class="item">
                        <img src=" <?php echo site_url('assets/img/bg_header.jpg'); ?>" alt="Second slide">
                    </div>
                </div>
                
            </div>
</div><!-- /.col -->
</div>
<div class="container middlecontent" style="min-height:350px"> 
<h4 class="page-header">Recently added exams</h4>
<?php if($exams){ ?>
    <div class="row"> 
    <?php if(isset($exams[0])) {  ?>
        <div class="col-md-6">
            <!-- Blue tile -->
            <div class="box box-solid bg-yellow">
                <div class="box-header">
                    <h3 class="box-title"><?php echo $exams[0]->name; ?></h3>
                </div>
                <div class="box-body">
                    <p>
                        <?php echo limit_text($exams[0]->description); ?>
                    </p>
                    <p>  <a href="<?php echo site_url('exams/takeexam/'.$exams[0]->id); ?>" class="btn btn-info toggle-modal">Take Exam</a>  </p>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    <?php } 
     if(isset($exams[1])) {  ?>
        <div class="col-md-6">
            <!-- Blue tile -->
            <div class="box box-solid bg-aqua">
                <div class="box-header">
                    <h3 class="box-title"><?php echo $exams[1]->name; ?></h3>
                </div>
                <div class="box-body">
                    <p>
                        <?php echo limit_text($exams[1]->description); ?>
                    </p>
                    <p>  <a href="<?php echo site_url('exams/takeexam/'.$exams[1]->id); ?>" class="btn btn-success toggle-modal">Take Exam</a>  </p>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        <?php } 
     if(isset($exams[2])) {  ?>
        <div class="col-md-6">
            <!-- Blue tile -->
            <div class="box box-solid bg-green">
                <div class="box-header">
                    <h3 class="box-title"><?php echo $exams[2]->name; ?></h3>
                </div>
                <div class="box-body">
                    <p>
                        <?php echo limit_text(ucfirst($exams[2]->description)); ?>
                    </p>
                    <p>  <a href="<?php echo site_url('exams/takeexam/'.$exams[2]->id); ?>" class="btn btn-danger toggle-modal">Take Exam</a>  </p>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        <?php } 
     if(isset($exams[3])) {  ?>
        <div class="col-md-6">
            <!-- Blue tile -->
            <div class="box box-solid bg-purple">
                <div class="box-header">
                    <h3 class="box-title"><?php echo $exams[3]->name; ?></h3>
                </div>
                <div class="box-body">
                    <p>
                        <?php echo limit_text($exams[3]->description); ?>
                    </p>
                    <p>  <a href="<?php echo site_url('exams/takeexam/'.$exams[3]->id); ?>" class="btn btn-warning toggle-modal">Take Exam</a>  </p>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        <?php } ?>
</div>

<?php } else { ?> 
<div class="callout callout-info">
    <h4>No exams have been added at the moment !</h4>
</div>

<?php } ?>
</div>



                        