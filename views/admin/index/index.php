<?php
//get collection from query string
$collectionID = '';

//create empty array to hold files
$arrayOfFiles = array();

$collection_items = get_records('Item',
            array(
                'collection' => $collectionID,
                'sort_field' => 'Collection',
                'sort_dir' => 'a',
            ),
            2000);
$pageTitle = __('Items with no Collection');
echo head(
    array(
        'title' => $pageTitle,
        'bodyclass' => 'items browse'
    )
);
?>
<div id="primary">
<?php
set_loop_records('items', $collection_items);
foreach (loop('items') as $item) :
	set_current_record('item', $item);
	if (!$collectionVAR = get_collection_for_item($item)) {
		echo "<a href=\"" . WEB_ROOT . "/admin/items/show/" . metadata($item,'id') . "\" target=\"_blank\">" . metadata($item, array('Dublin Core', 'Title')) . " - Item #" . metadata($item,'id') . "</a><br />";
	}
endforeach;
?>    
</div>
<?php echo foot(); ?>