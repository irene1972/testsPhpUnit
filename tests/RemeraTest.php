<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once "src/Remera.php";

/*
@covers MisClases\Remera
*/
final class RemeraTest extends TestCase
{
	public $remera;
	
	const ID=1;
	const NOMBRE='NOMBRE';
	const DESCRIPCION='DESCRIPCION';
	const LINK='LINK';
	const IMAGE='IMAGE';
	const TALLE='TALLE';
	const COLOR='COLOR';
	const PRECIO='PRECIO';

	public function setUp(){
		$this->remera=new MisClases\Remera(
											self::ID,
											self::NOMBRE,
											self::DESCRIPCION,
											self::LINK,
											self::IMAGE,
											self::TALLE,
											self::COLOR,
											self::PRECIO
		);
	}
	public function testCreate(){
		$this->assertInstanceOf(
			MisClases\Remera::class,$this->remera
		);
	}
}




