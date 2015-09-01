<?php 
 /**
     * Return Writing Tool object
     *
     * @return WrittingTool
     */
interface Factory{
	public function create($type);
}

interface WrittingTool{
	public function getName();
	public  function write();
}

class WrittingToolFactory implements Factory{
	public function create($type){
		switch ($type){
			case 'Pen':
			$tool = new Pen();
			break;
			case 'Pencil':
			$tool = new Pencil();
			break;
			case 'AutoPen':
			$tool = new AutoPen();
			break;
			case 'Colour_AutoPen':
			$tool = new Colour_AutoPen();
			break;
		}
		return $tool;
	}
}

class Pen implements WrittingTool{
	private $name = 'pen';
	
	public function getName(){
		return $this->name;
	}
	public function setName($a){
		 $this->name = $a;
		 return $this;
	}
	public function write(){
		return 'Write by a pen';
	}
	
}

class Pencil implements WrittingTool{
	public function getName(){
		return 'pencil';
	}
	public function write(){
		return 'Write by a pencil';
	}
}

class AutoPen extends Pen{
	private $isOpen = false;
	
	public function getIsOpen(){
		return $this->isOpen;
	}
	public function setIsOpen($a){
		$this->isOpen = $a;
		return $this;
	}
	public function checkIsOpen(){
		return $this->getIsOpen() ? true : false;
	}
	public function write(){
		return $this->checkIsOpen() ? 'The pen is writing' : 'switch on the pen';
	}
}

class Colour_AutoPen extends AutoPen{
	
	public $colour = 'blue';
	
	public function getColour(){
		return $this->colour;
	}
	
	public function setColour($b){
		$this->colour = $b;
		return $this;
	}
	
	public function write(){
		return $this->checkIsOpen() ? 'Written with a '.$this->getColour().' pen' : 'switch on the pen';
	}
}
	
	

	
$factory = new WrittingToolFactory();

$pen = $factory->create('Pen');
$pencil = $factory->create('Pencil');
$autopen = $factory->create('AutoPen');
$colourpen= $factory->create('Colour_AutoPen');

echo $pen->write() . PHP_EOL;
echo $pencil->write() . PHP_EOL;
$autopen->setIsOpen(true);
echo $autopen->write() . PHP_EOL;
$colourpen->setIsOpen(true);
$colourpen->setColour('red');
echo $colourpen->write() . PHP_EOL;
?>
