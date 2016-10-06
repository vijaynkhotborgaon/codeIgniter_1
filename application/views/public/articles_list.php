<?php include('public_header.php'); ?>
<div class="container">
	<table class="table">
		<thead>
			<td>S. No.</td>
			<td>Title</td>
			<td>Article Body</td>
		</thead>
		<tbody>
		<?php if(count($articles)):
		$count=$this->uri->segment(3,0);
		foreach($articles as $article): ?>
			<td><?= ++$count ?></td>
			<td><?= $article->title; ?></td>
			<td><?= $article->body; ?></td>
			
		</tr>
		<?php endforeach; ?>
		<?php else:?>
			<td colspan="3">No Records Found</td>	
		<?php endif;?>
		</tbody>
</table>
<?= $this->pagination->create_links();?>
</div>
<?php include('public_footer.php'); ?>