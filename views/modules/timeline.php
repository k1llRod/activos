<!-- Main content -->
<section class="content">

<!-- row -->
<div class="row">
  <div class="col-md-12">
    <!-- The time line -->
    <ul class="timeline">
      <!-- timeline time label -->
        <?php
            $timeline = new assignmentController();
            $timeline -> timeline();
        ?>
    </ul>
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->


</section>
<!-- /.content -->