<?php

defined('PHPFOX') or exit('NO DICE!');

/**
 *
 */
class Macore_Component_Block_Photocategory extends Phpfox_Component
{
    /**
     * Class process method wnich is used to execute this component.
     */
    public function process()
    {	

    	if (defined('PHPFOX_IS_USER_PROFILE'))
		{
			return false;
		}
		
	    $sCurrentCategory = $this->getParam('sCurrentCategory', null);
		
		$aCategories = Phpfox::getService('photo.category')->getForBrowse($sCurrentCategory, $this->getParam('sPhotoCategorySubSystem', null));
	    
	    if (empty($aCategories))
	    {
			return false;
	    }

		$aCallback = $this->getParam('aCallback', false);
		if ($aCallback !== false && is_array($aCategories))
		{
			$sHomeUrl = '/' . Phpfox::getLib('url')->doRewrite($aCallback['url_home_array'][0]) . '/' . implode('/', $aCallback['url_home_array'][1]) . '/' . Phpfox::getLib('url')->doRewrite('photo') . '/';			
			foreach ($aCategories as $iKey => $aCategory)
			{				
				$aCategories[$iKey]['url'] = preg_replace('/^http:\/\/(.*?)\/' . Phpfox::getLib('url')->doRewrite('photo') . '\/(.*?)$/i', 'http://\\1' . $sHomeUrl . '\\2', $aCategory['url']);
	
				if (isset($aCategory['sub']))
				{
					foreach ($aCategory['sub'] as $iSubKey => $aSubCategory)
					{
						$aCategories[$iKey]['sub'][$iSubKey]['url'] = preg_replace('/^http:\/\/(.*?)\/' . Phpfox::getLib('url')->doRewrite('photo') . '\/(.*?)$/i', 'http://\\1' . $sHomeUrl . '\\2', $aSubCategory['url']);		
					}
				}
			}		
		}		    

		if (!is_array($aCategories))
		{
			return false;
		}


		foreach ($aCategories as $iKey => $aCategory)
		{				
			$aCategories[$iKey]['url'] = str_replace('/mobile/', '/', $aCategories[$iKey]['url']);
		}


	    $this->template()->assign(array(
			'aMacCategories' => $aCategories
			)
	    );
	    
	    return 'block';

    }
}

?>