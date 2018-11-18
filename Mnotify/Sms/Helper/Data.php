<?php

namespace Mnotify\Sms\Helper;

use \Magento\Framework\App\ObjectManager as ObjectManager;
use \Magento\Framework\Event\Observer as Observer;
use \Magento\Store\Model\ScopeInterface as ScopeInterface;
use \Magento\Framework\App\Helper\AbstractHelper as AbstractHelper;

class Data extends AbstractHelper
{
    /**
     * This will used by mnotify sms admins to confirm which e-commerce platform is sending sms
     * @var string
     */
    protected $_platform         = 'Magento';
    /**
     * The version of e-commerce platform
     * @var string
     */
    protected $_platformVersion  = '2.0';
    /**
     * Return type of api method
     * @var string
     */
    protected $_format           = 'json';
    /**
     * To be used by the API
     * @var string
     */
    protected $_host             = 'https://www.mnotifysms.com/';

    /**
     * Getting Basic Configuration
     * These functions are used to get the api username and password
     */

    /**
     * Getting mnotifySMS API Username
     * @return string
     */
    public function getmnotifyApiUsername()
    {
        return $this->getConfig('mnotify_sms_configuration/basic_configuration/mnotify_username');
    }

    


    /**
     * Checking Admin SMS is enabled or not
     * @return string
     */
    public function isAdminNotificationsEnabled()
    {
        return $this->getConfig('mnotify_sms_admins/admin_configuration/mnotify_admin_enabled');
    }

    /**
     * Getting Admin Mobile Number
     * @return string
     */
    public function getAdminSenderId()
    {
        return $this->getConfig('mnotify_sms_admins/admin_configuration/mnotify_admin_mobile');
    }

    /**
     * Getting admin message for new order
     * @return string
     */
    public function getAdminMessageForNewOrder()
    {
        return $this->getConfig('mnotify_sms_admins/admin_configuration/mnotify_new_order_admin_message');
    }

    /**
     * Getting Admin message for order Hold
     * @return string
     */
    public function getAdminMessageForOrderHold()
    {
        return $this->getConfig('mnotify_sms_admins/admin_configuration/mnotify_hold_admin_message');
    }

    /**
     * Getting Admin message for order unhold
     * @return string
     */
    public function getAdminMessageForOrderUnHold()
    {
        return $this->getConfig('mnotify_sms_admins/admin_configuration/mnotify_unhold_admin_message');
    }

    /**
     * Getting Admin message for order cancelled
     * @return string
     */
    public function getAdminMessageForOrderCancelled()
    {
        return $this->getConfig('mnotify_sms_admins/admin_configuration/mnotify_cancelled_admin_message');
    }

    /**
     * Getting Admin message for Invoiced
     * @return string
     */
    public function getAdminMessageForInvoiced()
    {
        return $this->getConfig('mnotify_sms_admins/admin_configuration/mnotify_invoiced_admin_message');
    }


    /**
     * Getting Admin message for Sign up
     * @return string
     */
    public function getAdminMessageForRegister()
    {
        return $this->getConfig('mnotify_sms_admins/admin_configuration/mnotify_register_admin_message');
    }


    /**
     * Getting Customer Configuration
     * These functions are used to get the customer information when new order is placed
     */

    /**
     * Checking Customer SMS is enabled or not
     * @return string
     */
    public function isCustomerNotificationsEnabledOnOrder()
    {
        return $this->getConfig('mnotify_sms_orders/new_order/mnotify_new_order_enabled');
    }

    /**
     * Getting Customer Sender ID
     * @return string
     */
    public function getCustomerSenderId()
    {
        return $this->getConfig('mnotify_sms_orders/new_order/mnotify_new_order_sender_id');
    }

    /**
     * Getting Customer Message
     * @return string
     */
    public function getCustomerMessageOnOrder()
    {
        return $this->getConfig('mnotify_sms_orders/new_order/mnotify_new_order_message');
    }

    /**
     * Getting Customer Configuration
     * These functions are used to get the customer information when order is on hold
     */

    /**
     * Checking Customer SMS is enabled or not
     * @return string
     */
    public function isCustomerNotificationsEnabledOnHold()
    {
        return $this->getConfig('mnotify_sms_orders/hold_order/mnotify_hold_order_enabled');
    }

    /**
     * Getting Customer Sender ID
     * @return string
     */
    public function getCustomerSenderIdonHold()
    {
        return $this->getConfig('mnotify_sms_orders/hold_order/mnotify_hold_order_sender_id');
    }

    /**
     * Getting Customer Message
     * @return string
     */
    public function getCustomerMessageOnHold()
    {
        return $this->getConfig('mnotify_sms_orders/hold_order/mnotify_hold_order_message');
    }

    /**
     * Getting Customer Configuration
     * These functions are used to get the customer information when order is on un hold
     */

    /**
     * Checking Customer SMS is enabled or not
     * @return string
     */
    public function isCustomerNotificationsEnabledOnUnHold()
    {
        return $this->getConfig('mnotify_sms_orders/unhold_order/mnotify_unhold_order_enabled');
    }

    /**
     * Getting Customer Sender ID
     * @return string
     */
    public function getCustomerSenderIdonUnHold()
    {
        return $this->getConfig('mnotify_sms_orders/unhold_order/mnotify_unhold_order_sender_id');
    }

    /**
     * Getting Customer Message
     * @return string
     */
    public function getCustomerMessageOnUnHold()
    {
        return $this->getConfig('mnotify_sms_orders/unhold_order/mnotify_unhold_order_message');
    }

    /**
     * Getting Customer Configuration
     * These functions are used to get the customer information when order is Cancelled
     */

    /**
     * Checking Customer SMS is enabled or not
     * @return string
     */
    public function isCustomerNotificationsEnabledOnCancelled()
    {
        return $this->getConfig('mnotify_sms_orders/cancelled_order/mnotify_cancelled_order_enabled');
    }

    /**
     * Getting Customer Sender ID
     * @return string
     */
    public function getCustomerSenderIdonCancelled()
    {
        return $this->getConfig('mnotify_sms_orders/cancelled_order/mnotify_cancelled_order_sender_id');
    }

    /**
     * Getting Customer Message
     * @return string
     */
    public function getCustomerMessageOnCancelled()
    {
        return $this->getConfig('mnotify_sms_orders/cancelled_order/mnotify_cancelled_order_message');
    }

    /**
     * Getting Customer Configuration
     * These functions are used to get the customer information when invoice is created
     */

    /**
     * Checking Customer SMS is enabled or not
     * @return string
     */
    public function isCustomerNotificationsEnabledOnInvoiced()
    {
        return $this->getConfig('mnotify_sms_orders/invoiced_order/mnotify_invoiced_order_enabled');
    }

    /**
     * Getting Customer Sender ID
     * @return string
     */
    public function getCustomerSenderIdonInvoiced()
    {
        return $this->getConfig('mnotify_sms_orders/invoiced_order/mnotify_invoiced_order_sender_id');
    }

    /**
     * Getting Customer Message
     * @return string
     */
    public function getCustomerMessageOnInvoiced()
    {
        return $this->getConfig('mnotify_sms_orders/invoiced_order/mnotify_invoiced_order_message');
    }

    /**
     * The Basics:
     * These functions are used to do the basic functionality
     */

    /**
     * Send Configuration path to this function and get the module admin Config data
     * @param @var $configPath
     * @return string
     */
    public function getConfig($configPath)
    {
        return $this->scopeConfig->getValue(
            $configPath,
            ScopeInterface::SCOPE_STORE);
    }

 

   
    public function sendSms($username,  $senderID, $destination, $message)
    {

        $baseurl = "https://apps.mnotify.net/smsapi";
            $query = "?key=".$username."&to=".$destination."&msg=".$message."&sender_id=".$senderID."";
            $final_uri = $baseurl.$query;
            $response = file_get_contents($final_uri);
            header ("Content-Type:text/xml");
    }


    public function manipulateSMS($message, $data)
    {
        $keywords   = [
            '{order_id}',
            '{firstname}',
            '{middlename}',
            '{lastname}',
            '{dob}',
            '{email}',
            '{price}',
            '{cc}',
            '{gender}',
            '{pc}'
        ];
        $message            = str_replace($keywords, $data, $message);
        return $message;
    }

    /**
     * The Fetchers
     * These functions are used to fetch the details using observer
     */

    /**
     * Getting Products
     * @param Observer $observer
     * @return string
     */
    public function getProduct(Observer $observer)
    {
        $productId          = $observer->getProduct()->getId();
        $objectManager      = ObjectManager::getInstance();
        $product            = $objectManager->get('Magento\Catalog\Model\Product')->load($productId);
        return $product;
    }

    /**
     * Getting Order Details
     * @param Observer $observer
     * @return string
     */
    public function getOrder(Observer $observer)
    {
        $order              = $observer->getOrder();
        $orderId            = $order->getIncrementId();
        $objectManager      = ObjectManager::getInstance();
        $order              = $objectManager->get('Magento\Sales\Model\Order');
        $orderInformation   = $order->loadByIncrementId($orderId);
        return $orderInformation;
    }
}