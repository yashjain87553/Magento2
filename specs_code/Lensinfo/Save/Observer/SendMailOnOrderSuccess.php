<?php
 
namespace Lensinfo\Save\Observer;
 
use Magento\Framework\Event\ObserverInterface;
 
class SendMailOnOrderSuccess implements ObserverInterface
{
    /**
     * @var \Magento\Sales\Model\OrderFactory
     */
    protected $orderModel;
    protected $customerSession;
    protected $lensinfosaveFactory;
 
    /**
     * @var \Magento\Sales\Model\Order\Email\Sender\OrderSender
     */
    protected $orderSender;
 
    /**
     * @var \Magento\Checkout\Model\Session $checkoutSession
     */
    protected $checkoutSession;
 
    /**
     * @param \Magento\Sales\Model\OrderFactory $orderModel
     * @param \Magento\Sales\Model\Order\Email\Sender\OrderSender $orderSender
     * @param \Magento\Checkout\Model\Session $checkoutSession
     *
     * @codeCoverageIgnore
     */
    public function __construct(
        \Magento\Sales\Model\OrderFactory $orderModel,
        \Magento\Sales\Model\Order\Email\Sender\OrderSender $orderSender,
        \Magento\Checkout\Model\Session $checkoutSession,
        \Magento\Customer\Model\Session $customerSession,
        \Lensinfo\Save\Model\LensinfosaveFactory $lensinfosaveFactory
    )
    {
        $this->orderModel = $orderModel;
        $this->orderSender = $orderSender;
        $this->checkoutSession = $checkoutSession;
        $this->customerSession = $customerSession;
        $this->lensinfosaveFactory         = $lensinfosaveFactory;
    }
 
    /**
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $orderIds = $observer->getEvent()->getOrderIds();
        $datas=$this->customerSession->getMyTestValue();
        foreach($datas as $data)
        {
            $lensinfosave = $this->lensinfosaveFactory->create();
            $lensinfosave->setOrderId($orderIds[0]);
            $lensinfosave->setName($data['firstName']);
            $lensinfosave->setCost($data['lastName']);
            $lensinfosave->save();

        }
        $this->customerSession->setCount();
        $this->customerSession->setMyTestValue();
        if(count($orderIds))
        {
            
        
            $this->checkoutSession->setForceOrderMailSentOnSuccess(true);
            $order = $this->orderModel->create()->load($orderIds[0]);
            $this->orderSender->send($order, true);
        }
    }
}