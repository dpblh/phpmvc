<?php 

	function will_pagination($data) {
		$activity = '';
		$limit = $data['limit'];
		echo '<div class="pagination">';
			echo '<ul>';
			for ($i = 1; $i < $data['all_page']+1; $i++) {
				if($data['current_page'] == $i)	$activity = 'class="active"';
				else $activity = '';
				echo '<li '.$activity.' ><a href=\'/person?page='.$i.'&limit='.$limit.'\'>'.$i.'</a></li>';
			}
			echo '</ul>';
		echo '</div>';
	}

 ?>