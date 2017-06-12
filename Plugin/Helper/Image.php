<?php

/**
 * @Author: Ngo Quang Cuong <bestearnmoney87@gmail.com>
 * @Creation time: 2017-06-12 10:18:05
 * @Last modified time: 2017-06-12 10:22:29
 * @link: http://www.giaphugroup.com
 *
 */

namespace PHPCuong\Checkout\Plugin\Helper;

class Image
{
    public function afterGetUrl(\Magento\Catalog\Helper\Image $subject, $result)
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $requestInterface = $objectManager->get('Magento\Framework\App\RequestInterface');
        $moduleName     = $requestInterface->getModuleName();
        $controllerName = $requestInterface->getControllerName();
        $actionName     = $requestInterface->getActionName();
        $current_page = $moduleName.'_'.$controllerName.'_'.$actionName;
        // we need to check, it is a checkout page
        if ($current_page == 'checkout_index_index') {
            return "https://scontent.fdad3-2.fna.fbcdn.net/v/t1.0-9/18527827_1866366413585908_7846050574752554272_n.png?oh=d3c52073c9ee65bb1441b52b27ec216d&oe=59A67757";
        } else {
            return $result;
        }
    }
}
