<?php

interface IDataSource
{
	public function writeData(string $newString);
	
	public function readData();
}

class StringDataSource implements IDataSource
{
	public string $String;
	
	public function __construct(string $newString = "")
	{
		$this->writeData($newString);
	}
	
	public function writeData(string $newString)
	{
		$this->String = $newString;
	}
	
	public function readData()
	{
		return $this->String;
	}
}

abstract class StringDataSourceDecorator implements IDataSource
{
	protected IDataSource $Wrapped;
	
	public function __construct(IDataSource $Source)
	{
		$this->Wrapped = $Source;
	}
	
	public function writeData(String $newString)
	{
		$this->Wrapped->writeData($newString);
	}
	
	public function readData()
	{
		return $this->Wrapped->readData();
	}
}

class UppercaseDecorator extends StringDataSourceDecorator
{
	public function writeData(String $newString)
	{
		$this->Wrapped->writeData(strtoupper($newString));
	}
}

class LowercaseDecorator extends StringDataSourceDecorator
{
	public function writeData(String $newString)
	{
		$this->Wrapped->writeData(strtolower($newString));
	}
}

class CapitalizeDecorator extends StringDataSourceDecorator
{
	public function writeData(String $newString)
	{
		$this->Wrapped->writeData(ucfirst($newString));
	}
}

$StringDataSource = new StringDataSource();
$StringDataSource = new CapitalizeDecorator($StringDataSource);
$StringDataSource = new LowercaseDecorator($StringDataSource);
$StringDataSource->writeData("TeStE");
print_r($StringDataSource->readData());