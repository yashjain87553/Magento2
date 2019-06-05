<?php
namespace Evdpl\Customtax\Model\Total\Quote;
use Magento\Checkout\Model\ConfigProviderInterface;
class Custom extends \Magento\Quote\Model\Quote\Address\Total\AbstractTotal implements ConfigProviderInterface
{
   protected $_priceCurrency;
   protected $x;
   protected $customerSession;
   public function __construct(
       \Magento\Framework\Pricing\PriceCurrencyInterface $priceCurrency,
        \Magento\Customer\Model\Session $customerSession
   ){
       $this->_priceCurrency = $priceCurrency;
       $this->customerSession = $customerSession;
   }
   public function collect(
       \Magento\Quote\Model\Quote $quote,
       \Magento\Quote\Api\Data\ShippingAssignmentInterface $shippingAssignment,
       \Magento\Quote\Model\Quote\Address\Total $total
   )
   {
       parent::collect($quote, $shippingAssignment, $total);
       $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
       $cart = $objectManager->get('\Magento\Checkout\Model\Cart');
       $subTotal = $cart->getQuote()->getSubtotal();
           $baselenscost=$this->customerSession->getLenscost();
           $lenscost =  $this->_priceCurrency->convert($baselenscost);
           $total->addTotalAmount('customdiscount', +$lenscost);
           $total->addBaseTotalAmount('customdiscount', +$baselenscost);
           $total->setBaseGrandTotal($total->getBaseGrandTotal() + $baselenscost);
           $quote->setCustomDiscount(+$lenscost);
       return $this;
   }
   
   public function getConfig()
    {
        $config = [];
        $config['myCustomData'] = $this->customerSession->getMyTestValue();
        return $config;
    }
}