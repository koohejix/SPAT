<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

require_once('../Models/OrdersFunctions.php');
final class OrderTest extends TestCase
{
    public function testFetchAllPending()
    {
        $orders = new OrdersFunctions();
        $pendingOrders = $orders->fetchAllPending();
        foreach($pendingOrders as $item){
            $this->assertSame($item->getStatus(), 'pending');
        }
    }
    public function testFetchAllAccepted()
    {
        $orders = new OrdersFunctions();
        $acceptedOrders = $orders->fetchAllAccepted();
        foreach($acceptedOrders as $item){
            $this->assertSame($item->getStatus(), 'accepted');
        }
    }
    public function testFetchAllSuccessful()
    {
        $orders = new OrdersFunctions();
        $successfulOrders = $orders->fetchAllSuccessful();
        foreach($successfulOrders as $item){
            $this->assertSame($item->getStatus(), 'successful');
        }
    }
}
