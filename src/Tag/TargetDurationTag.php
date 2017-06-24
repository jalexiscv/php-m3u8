<?php

/*
 * This file is part of the PhpM3u8 package.
 *
 * (c) Chrisyue <http://chrisyue.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Chrisyue\PhpM3u8\Tag;

class TargetDurationTag extends AbstractHeadTag
{
    private $targetDuration;

    const TAG_IDENTIFIER = '#EXT-X-TARGETDURATION';

    public function setTargetDuration($targetDuration)
    {
        $this->targetDuration = $targetDuration;

        return $this;
    }

    public function getTargetDuration()
    {
        return $this->targetDuration;
    }

    public function dump()
    {
        return sprintf('%s:%d', self::TAG_IDENTIFIER, $this->targetDuration);
    }

    protected function read($line)
    {
        preg_match('/^#EXT-X-TARGETDURATION:(\d+)/', $line, $matches);
        $this->targetDuration = (int) $matches[1];
    }
}
