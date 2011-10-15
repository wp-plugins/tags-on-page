<?php
/*
This file is a part of the "Tags On Page" plugin for WordPress. 
Author: CyberSEO.NET
*/

if (isset ( $_POST ['Submit'] )) {
	$update_tage_on_page_queries = array ();
	$update_tage_on_page_text = array ();
	$update_tage_on_page_queries [] = update_option ( TAGS_ON_PAGE_PAGE_TITLE, $_POST [TAGS_ON_PAGE_PAGE_TITLE] );
	$update_tage_on_page_queries [] = update_option ( TAGS_ON_PAGE_NUMBER_OF_TAGS, $_POST [TAGS_ON_PAGE_NUMBER_OF_TAGS] );
	$update_tage_on_page_queries [] = update_option ( TAGS_ON_PAGE_SMALLEST_SIZE, $_POST [TAGS_ON_PAGE_SMALLEST_SIZE] );
	$update_tage_on_page_queries [] = update_option ( TAGS_ON_PAGE_LARGEST_SIZE, $_POST [TAGS_ON_PAGE_LARGEST_SIZE] );
	$update_tage_on_page_text [] = __ ( 'Page' );
	$update_tage_on_page_text [] = __ ( 'Number of tags' );
	$update_tage_on_page_text [] = __ ( 'Smallest' );
	$update_tage_on_page_text [] = __ ( 'Largest' );
	$i = 0;
	$text = '';
	foreach ( $update_tage_on_page_queries as $update_tage_on_page_query ) {
		if ($update_tage_on_page_query) {
			$text .= $update_tage_on_page_text [$i] . ' ' . __ ( 'Updated' ) . '<br />';
		}
		$i ++;
	}
	if (empty ( $text )) {
		$text = __ ( 'No Option Updated' );
	} else {
		echo '<div id="message" class="updated fade"><p>' . $text . '</p></div>';
	}
}
?>

<div class="wrap">
<h2><?php
_e ( 'Tags On Page' );
?></h2>

<form method="post"
	action="<?php
	echo strtok ( $_SERVER ['REQUEST_URI'], "?" ) . "?" . strtok ( "?" );
	?>">

<table class="widefat" style="margin-top: .5em" width="100%">
	<tbody>
		<tr>
			<td>
			<table class="form-table">
				<tr>
					<td>Page</td>
					<td>
<?php
echo '<input type="text" name="' . TAGS_ON_PAGE_PAGE_TITLE . '" value="' . get_option ( TAGS_ON_PAGE_PAGE_TITLE ) . '" size="10"> - ID, Title or Slug of the page (must be created in advance) which will be used to display the tags.' . "\n";
?>
        			</td>
				</tr>
				<tr>
					<td>Number of tags</td>
					<td>
<?php
echo '<input type="text" name="' . TAGS_ON_PAGE_NUMBER_OF_TAGS . '" value="' . get_option ( TAGS_ON_PAGE_NUMBER_OF_TAGS ) . '" size="10"> - the max number of actual tags to display. Use <strong>0</strong> to display all tags.' . "\n";
?>
        			</td>
				</tr>
				<tr>
					<td>Smallest</td>
					<td>
<?php
echo '<input type="text" name="' . TAGS_ON_PAGE_SMALLEST_SIZE . '" value="' . get_option ( TAGS_ON_PAGE_SMALLEST_SIZE ) . '" size="10"> - the text size of the tag with the smallest count value.' . "\n";
?>
        			</td>
				</tr>
				<tr>
					<td>Largest</td>
					<td>
<?php
echo '<input type="text" name="' . TAGS_ON_PAGE_LARGEST_SIZE . '" value="' . get_option ( TAGS_ON_PAGE_LARGEST_SIZE ) . '" size="10"> - the text size of the tag with the highest count value.' . "\n";
?>
        			</td>
				</tr>
			</table>
			</td>
		</tr>
	</tbody>
</table>

<br />

<div align="center"><input type="submit" name="Submit"
	class="button-primary" value="<?php
	_e ( 'Update Options' );
	?>" />&nbsp;&nbsp;<input type="button" name="cancel" value="Cancel"
	class="button" onclick="javascript:history.go(-1)" /></div>

</form>

</div>