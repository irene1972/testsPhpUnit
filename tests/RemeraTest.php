<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once "src/Remera.php";

    /**
     * @covers MisClases\Remera
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
	//const DOLARCOTIZACION='DOLARCOTIZACION';

	const DIRECTORIO='DIRECTORIO/';

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

    /**
     * @dataProvider showRowProvider
     */
	public function testShowRow($objetoImagenShowRow, $resultado){
		$this->assertEquals($objetoImagenShowRow, $resultado);
	}

	public function showRowProvider()
    {
        return [
            'Remera s' => [(new MisClases\Remera(
            										'1',
            										'Pequeña',
            										'Una remera pequeña',
            										'1',
            										'1.jpg',
            										's',
            										'rojo',
            										'10'
            										))->showRow(self::DIRECTORIO),"<tr><td>1</td><td>Pequeña</td><td>Una remera pequeña</td><td><a href='1'>1</a></td><td><img src=\"https://http://local.poo.com/DIRECTORIO/1.jpg\" height='120'width='120' ></img></td><td>s</td><td>rojo</td><td>10</td></tr>"],
            'Remera xl' => [(new MisClases\Remera(
            										'2',
            										'Grande',
            										'Una remera grande',
            										'2',
            										'2.jpg',
            										'XL',
            										'verde',
            										'8'
            										))->showRow(self::DIRECTORIO),"<tr><td>2</td><td>Grande</td><td>Una remera grande</td><td><a href='2'>2</a></td><td><img src=\"https://http://local.poo.com/DIRECTORIO/2.jpg\" height='120'width='120' ></img></td><td>XL</td><td>verde</td><td>8</td></tr>"]
        ];
    }

}




