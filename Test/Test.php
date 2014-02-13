<?php

class Test extends PHPUnit_Framework_TestCase {

	function testItCanReadAPDFBook() {
		$b = new PDFBook();
		$r = new EBookReader($b);

		$this->assertRegExp('/pdf book/', $r->read());
	}

	function testItCanReadAMobiBook() {
		$b = new MobiBook();
		$r = new EBookReader($b);

		$this->assertRegExp('/mobi book/', $r->read());
	}

}

interface EBook {
	function read();
}

class EBookReader {

	private $book;

	function __construct(EBook $book) {
		$this->book = $book;
	}

	function read() {
		return $this->book->read();
	}

}

class PDFBook implements EBook {

	function read() {
		return "reading a pdf book.";
	}
}

class MobiBook implements EBook {

	function read() {
		return "reading a mobi book.";
	}
}