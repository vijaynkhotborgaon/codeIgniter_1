<?php include('admin_header.php');?>

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<?= anchor('admin/store_article','ADD ARTICLE',['class'=>'btn btn-primary pull-right'])?>
		     
		</div>
	</div>

	<?php if($feedback=$this->session->flashdata('feedback')): 
			$feedback_class=$this->session->flashdata('feedback-class');
	?>
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">

		    <div class="alert alert-dismissible <?= $feedback_class ?>">
		      <strong><?= $feedback ?></strong>
		    </div>
	    </div>
	</div>
  	<?php endif;?>

	<table class="table">
		<thead>
			<td>S. No.</td>
			<td>Title</td>
			<td>Image</td>
			<td>Action</td>
		</thead>
		<tbody>
		<?php if(count($articles)):
		$count=$this->uri->segment(3,0);
		
		 foreach($articles as $article): ?>
			<td><?= ++$count ?></td>
			<td><?= $article->title; ?></td>
			<td>
			<?php if(!is_null($article->image_path)):?>
			
			<img src="<?php echo $article->image_path; ?>" alt="" width="50px" height="50px"/>
			
			<?php endif;?>
			</td>
			<td>
				<div class="row">
				<div class="col-lg-2">
				<?= anchor("admin/edit_article/$article->id","Edit",['class'=>'btn btn-primary']) ?>
				<!--<a href="#" class="btn btn-primary">Edit</a>-->
				</div>

				<div class="col-lg-2">
				<?=
					form_open('admin/delete_article'),
					form_hidden('article_id',$article->id),
					form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-danger']),
					form_close();


				?>
				</div>
				</div>

				<!--<a href="#" class="btn btn-danger">Delete</a>-->
			</td>
		</tr>
		<?php endforeach; ?>
		<?php else:?>
			<td colspan="3">No Records Found</td>	
		<?php endif;?>
		</tbody>
		
		

	</table>
	<?= $this->pagination->create_links();?>
</div>




<?php include('admin_footer.php');?>