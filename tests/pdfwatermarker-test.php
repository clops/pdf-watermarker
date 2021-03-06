<?php

$parent_directory = dirname(__FILE__);

require_once($parent_directory."/../fpdf/fpdf.php");
require_once($parent_directory."/../fpdi/fpdi.php");
require_once($parent_directory."/../pdfwatermarker/pdfwatermarker.php");
require_once($parent_directory."/../pdfwatermarker/pdfwatermark.php");

class PDFWatermarker_test extends PHPUnit_Framework_TestCase
{
    public $watermark;
    public $watermarker;
    public $output;
	public $parent_directory;

    function setUp() {
		
		$this->parent_directory = dirname(__FILE__);
		
        $this->watermark = new PDFWatermark($this->parent_directory.'/../assets/star.png');

        $this->output = $this->parent_directory ."/../assets/test-output.pdf";

        $this->watermarker = new PDFWatermarker($this->parent_directory.'/../assets/test.pdf', $this->output, $this->watermark); 
		
    }
	
	/* 
	 * Test default watermark configuration
	 * 
	 * @return void
	 */
    public function testDefaultOptions() {
		
        $this->watermarker->savePdf(); 
        $this->assertTrue( file_exists($this->output) === true );
		$this->assertTrue( filesize($this->parent_directory.'/../assets/output-default-position.pdf') === filesize($this->output) );

    }
	
	/* 
	 * Test 'topright' watermark position
	 * 
	 * @return void
	 */
    public function testTopRightPosition() {
		$this->watermark->setPosition('topright');
        $this->watermarker->savePdf(); 
        $this->assertTrue( file_exists($this->output) === true );
		$this->assertTrue( filesize($this->parent_directory.'/../assets/output-topright-position.pdf') === filesize($this->output) );
    }
	
	/* 
	 * Test 'topleft' watermark position
	 * 
	 * @return void
	 */
    public function testTopLeftPosition() {
		$this->watermark->setPosition('topleft');
        $this->watermarker->savePdf(); 
        $this->assertTrue( file_exists($this->output) === true );
		$this->assertTrue( filesize($this->parent_directory.'/../assets/output-topleft-position.pdf') === filesize($this->output) );
    }
	
	/* 
	 * Test 'bottomright' watermark position
	 * 
	 * @return void
	 */
    public function testBottomRightPosition() {
		$this->watermark->setPosition('bottomright');
        $this->watermarker->savePdf(); 
        $this->assertTrue( file_exists($this->output) === true );
		$this->assertTrue( filesize($this->parent_directory.'/../assets/output-bottomright-position.pdf') === filesize($this->output) );
    }
	
	/* 
	 * Test 'bottomleft' watermark position
	 * 
	 * @return void
	 */
    public function testBottomLeftPosition() {
		$this->watermark->setPosition('bottomleft');
        $this->watermarker->savePdf(); 
        $this->assertTrue( file_exists($this->output) === true );
		$this->assertTrue( filesize($this->parent_directory.'/../assets/output-bottomleft-position.pdf') === filesize($this->output) );
    }
	
	/* 
	 * Test watermark as background
	 * 
	 * @return void
	 */
    public function testAsBackground() {
		$this->watermark->setAsBackground();
        $this->watermarker->savePdf(); 
        $this->assertTrue( file_exists($this->output) === true );
		$this->assertTrue( filesize($this->parent_directory.'/../assets/output-as-background.pdf') === filesize($this->output) );
    }
	
}