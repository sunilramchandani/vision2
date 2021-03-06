<?php $__env->startSection('page-css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/events-single.css')); ?>">
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('content'); ?>

<div class = "whole-page">

    <img src="<?php echo e(URL::asset('image/photos/Internship.jpg')); ?>" class="img img-responsive header" alt="Company Banner">
    <img src="<?php echo e(URL::asset('image/Arrow.png')); ?>" class="img img-border" alt="Company Banner">
    <img src="<?php echo e(URL::asset('image/img-line.png')); ?>" class="img img-responsive img-line" alt="Company Banner">
    <div class = "col-xs-10 col-xs-offset-1 row">
    	<a href = "/event" class = "back"><h3> Back to Events </h3></a>
    </div>
    <div class = "col-xs-12 col-md-8 col-md-offset-1">
    	<img src="<?php echo e($events->cover_source); ?>" alt="" class = "event-img img">
    	<h4><?php echo e($events->event_name); ?></h4>
    	<p><?php echo e(Carbon\Carbon::parse($events->start_time)->toFormattedDateString()); ?> | <?php echo e(Carbon\Carbon::parse($events->start_time)->format('h:i')); ?> - <?php echo e($events->place_name); ?></p>
    	<p class = "event-description"><?php echo e($events->event_description); ?></p>
    	<hr>
    	<div class = "row">
			<div class="col-xs-9 share-main-title ">
        <div class = "col-md-6 col-xs-12">
	        <span>Share This Event: </span>
        </div>
        <div class = "col-md-6 col-xs-12">
            <a  href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(urlencode(Request::fullUrl())); ?>" target="_blank">
            <i class="fa fa-facebook-f " style="font-size:20px; padding-right:1%; color:black;"></i>
            </a>
            <a href="https://twitter.com/intent/tweet?url=<?php echo e(urlencode(Request::fullUrl())); ?>" target="_blank">
            <i class="fa fa-twitter " style="font-size:20px; padding-right:1%; color:black;"></i>
            </a>
            <a href="https://plus.google.com/share?url=<?php echo e(urlencode(Request::fullUrl())); ?>" target="_blank">
            <i class="fa fa-google-plus " style="font-size:20px; color:black;"></i>
            </a>
          </div>
	     </div>
	        <div class="col-xs-3 Categories">
	        	<span>Categories: <?php echo e($events->category); ?></span>
	        </div>
	    </div>
      <?php if($previousevents != Null && $nextevents != Null): ?>
        <div class = "row next-previous-container">
	       
	        <div class = "col-xs-6 left"> 
	        	<div class = "text-left arrow">
              <?php if($previousevents != Null): ?>
	        		<a href = "<?php echo e($previousevents->fbevent_id); ?>" class="text-left">< Previous</a>
		        	<br>
		        	<a href = "<?php echo e($previousevents->fbevent_id); ?>" class="text-left"><h4><?php echo e($previousevents->event_name); ?></h4></a>
              <?php endif; ?>
		        </div>
	        </div>
	        
	        
	        <div class = "col-xs-6">
	        	<div class = "arrow">
              <?php if($nextevents != Null): ?>
		        	<a href = "<?php echo e($nextevents->fbevent_id); ?>" class="text-right">Next ></a>
		        	<br>
		        	<a href = "<?php echo e($nextevents->fbevent_id); ?>" class="text-right"><h4><?php echo e($nextevents->event_name); ?></h4></a>
		         <?php endif; ?>
            </div>
	        </div>
	        
	    </div>
      <?php endif; ?>
    </div>
	<div class = "col-md-3 hidden-xs hidden-sm">
        <table class="table table-categories table-borderless table-hover">
          <thead bgcolor="#800000">
            <tr>
              <th class = "header-table text-center">CATEGORIES</th>
              <th class = "header-table text-center"></th>
            </tr>
          </thead>
          <tbody>
          <?php $__currentLoopData = $category_table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr class='clickable-row' data-href='/event?event_id=<?php echo e($category->id); ?>'>
              <td>
                <?php echo e($category->category_name); ?></td>
              <td>
                      <i style="color:black;"><?php echo e($category->eventcategorytable_count); ?></i>
              </td>

          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
       </table>    
	</div>
</div>
<div class = "row filler" style = "padding-bottom: 5%;"></div>
<script type="text/javascript" charset="utf8" src="<?php echo e(asset('/js/jquery-3.2.1.min.js')); ?>"></script>
<script type="text/javascript" charset="utf8" src="<?php echo e(asset('/js/bootstrap.min.js')); ?>"></script>

<script type="text/javascript">
var popupMeta = {
    width: 400,
    height: 400
}
$(document).on('click', '.social-share', function(event){
    event.preventDefault();

    var vPosition = Math.floor(($(window).width() - popupMeta.width) / 2),
        hPosition = Math.floor(($(window).height() - popupMeta.height) / 2);

    var url = $(this).attr('href');
    var popup = window.open(url, 'Social Share',
        'width='+popupMeta.width+',height='+popupMeta.height+
        ',left='+vpPsition+',top='+hPosition+
        ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

    if (popup) {
        popup.focus();
        return false;
    }
});
</script>
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

<script>

  jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
  });
</script>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>