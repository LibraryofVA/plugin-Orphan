<?php
class OrphanPlugin extends Omeka_Plugin_AbstractPlugin
{
	 protected $_filters = array(
        'admin_navigation_main',
    );

	/**
     * Add Orphan to the admin navigation.
     *
     * @param array $nav
     * @return array
     */
    public function filterAdminNavigationMain($nav)
    {
        $nav[] = array('label' => __('No Collection'), 'uri' => url('orphan'));
        return $nav;
    }
}
$orphanPlugin = new OrphanPlugin();
$orphanPlugin->setUp();