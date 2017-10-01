<?php

defined('PHPFOX') or exit('NO DICE!');

class Macore_Component_Block_Blogcategory extends Phpfox_Component 
{
	/**
	 * Class process method wnich is used to execute this component.
	 */
	public function process()
	{
		$bIsProfile = false;
		if ($this->getParam('bIsProfile') === true && ($aUser = $this->getParam('aUser')))
		{
			$bIsProfile = true;
		}
				
        $aCategories = Phpfox::getService('blog.category')->getCategories('c.user_id = ' . ($bIsProfile ? $aUser['user_id'] : '0'));
		if (!is_array($aCategories))
		{
			return false;
		}
		
		if (!$aCategories)
		{
			return false;
		}

		foreach ($aCategories as $iKey => $aCategory)
		{
			$aCategories[$iKey]['url'] = ($bIsProfile ? $this->url()->permalink(array($aUser['user_name'] . '.blog.category', 'view' => $this->request()->get('view')), $aCategory['category_id'], $aCategory['name']) : $this->url()->permalink(array('blog.category', 'view' => $this->request()->get('view')), $aCategory['category_id'], $aCategory['name']));
		}
		
		$this->template()->assign(array(
				'aCategories' => $aCategories,
				'iCategoryBlogView' => $this->request()->getInt('req3')
			)
		);	

		return 'block';
	}

}

?>