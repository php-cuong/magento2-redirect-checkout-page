<?php

/**
 * @Author: Ngo Quang Cuong <bestearnmoney87@gmail.com>
 * @Creation time: 2017-06-12 10:02:19
 * @Last modified time: 2017-06-12 10:16:56
 * @link: http://www.giaphugroup.com
 *
 */

namespace PHPCuong\Checkout\Plugin\Controller\Cart;

class Add
{
    protected $_url;

    protected $request;

    public function __construct(
        \Magento\Framework\UrlInterface $url,
        \Magento\Framework\App\Request\Http $request
    )
    {
        $this->_url = $url;
        $this->request = $request;
    }

    public function aroundExecute(\Magento\Checkout\Controller\Cart\Add $subject, \Closure $proceed)
    {
        $returnValue = $proceed();
        // We need to check, does the request send from Ajax?
        if (!$this->request->isAjax()) {
            // get the url of the checkout page
            $checkoutUrl = $this->_url->getUrl('checkout/index/index');
            // set the url for redirecting
            $returnValue->setUrl($checkoutUrl);
        }
        return $returnValue;
    }
}
