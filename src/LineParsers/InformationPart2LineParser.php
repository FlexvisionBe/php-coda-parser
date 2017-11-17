<?php

namespace Codelicious\Coda\LineParsers;

use function Codelicious\Coda\Helpers\trimSpace;
use Codelicious\Coda\Lines\InformationPart2Line;

/**
 * @package Codelicious\Coda
 * @author Wim Verstuyf (wim.verstuyf@codelicious.be)
 * @license http://opensource.org/licenses/GPL-2.0 GPL-2.0
 */
class InformationPart2LineParser implements LineParserInterface
{
	/**
	 * @param string $codaLine
	 * @return InformationPart2Line
	 */
	public function parse(string $codaLine)
	{
		return new InformationPart2Line(
			trim(substr($codaLine, 2, 4)),
			trim(substr($codaLine, 6, 4)),
			trimSpace(substr($codaLine, 10, 105))
		);
	}
	
	public function canAcceptString(string $codaLine)
	{
		return strlen($codaLine) == 128 && substr($codaLine, 0, 2) == "32";
	}
}
