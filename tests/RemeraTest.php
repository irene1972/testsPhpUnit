<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once "vendor/autoload.php";

require_once "src/Remera.php";
require_once "src/DolarCotizacion.php";

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
		$mockDolarCotizacion = Mockery::mock(new MisClases\DolarCotizacion);
		$this->remera=new MisClases\Remera(
											self::ID,
											self::NOMBRE,
											self::DESCRIPCION,
											self::LINK,
											self::IMAGE,
											self::TALLE,
											self::COLOR,
											self::PRECIO,
											$mockDolarCotizacion
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
    	$mockDolarCotizacion = Mockery::mock(new MisClases\DolarCotizacion);
    	$mockDolarCotizacion->shouldReceive('ConvertirOficial')
    		->with(10)
    		->andReturn(150);
    	$mockDolarCotizacion->shouldReceive('ConvertirOficial')
    		->with(8)
    		->andReturn(120);
        return [
            'Remera s' => [(new MisClases\Remera(
            										'1',
            										'Pequeña',
            										'Una remera pequeña',
            										'1',
            										'1.jpg',
            										's',
            										'rojo',
            										'10',
            										$mockDolarCotizacion
            										))->showRow(self::DIRECTORIO),"<tr><td>1</td><td>Pequeña</td><td>Una remera pequeña</td><td><a href='1'>1</a></td><td><img src=\"https://http://local.poo.com/DIRECTORIO/1.jpg\" height='120'width='120' ></img></td><td>s</td><td>rojo</td><td>150</td></tr>"],
            'Remera xl' => [(new MisClases\Remera(
            										'2',
            										'Grande',
            										'Una remera grande',
            										'2',
            										'2.jpg',
            										'XL',
            										'verde',
            										'8',
            										$mockDolarCotizacion
            										))->showRow(self::DIRECTORIO),"<tr><td>2</td><td>Grande</td><td>Una remera grande</td><td><a href='2'>2</a></td><td><img src=\"https://http://local.poo.com/DIRECTORIO/2.jpg\" height='120'width='120' ></img></td><td>XL</td><td>verde</td><td>120</td></tr>"]
        ];
    }

}




