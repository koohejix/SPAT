<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

require_once('../Models/MenuFunctions.php');
final class MenuTest extends TestCase
{
    public function testFetchSalads()
    {
        $menuDataSet = new MenuFunctions();
        $saladsDataSet = $menuDataSet->fetchSalads();
        foreach($saladsDataSet as $item){
            $this->assertSame($item->getCategory(), 'Salads');
        }
    }
    public function testFetchStarters()
    {
        $menuDataSet = new MenuFunctions();
        $startersDataSet = $menuDataSet->fetchStarters();
        foreach($startersDataSet as $item){
            $this->assertSame($item->getCategory(), 'Starters');
        }
    }
    public function testFetchSushi()
    {
        $menuDataSet = new MenuFunctions();
        $sushiDataSet = $menuDataSet->fetchSushi();
        foreach($sushiDataSet as $item){
            $this->assertSame($item->getCategory(), 'Sushi');
        }
    }
}
