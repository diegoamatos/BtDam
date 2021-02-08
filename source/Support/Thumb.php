<?php

namespace Source\Support;

use SimpSyst\Thumbcrop\Thumbcrop;

/**
 * BTDAM | Class Thumb
 *
 * @author Diego Matos <oi@diegomatos.com>
 * @package Source\Support
 */
class Thumb
{
    /** @var Thumbcrop */
    private $thumbcrop;

    /** @var string */
    private $uploads;

    /**
     * Thumb constructor.
     */
    public function __construct()
    {
        $this->thumbcrop = new Thumbcrop(CONF_IMAGE_CACHE, CONF_IMAGE_QUALITY['jpg'], CONF_IMAGE_QUALITY['png']);
        $this->uploads = CONF_UPLOAD_DIR;
    }

    /**
     * @param string $image
     * @param int $width
     * @param int|null $height
     * @return string
     */
    public function make(string $image, int $width, ?int $height = null): string
    {
        return $this->thumbcrop->make("{$this->uploads}/{$image}", $width, $height);
    }

    /**
     * @param string|null $image
     */
    public function flush(?string $image = null): void
    {
        if ($image) {
            $this->thumbcrop->flush("{$this->uploads}/{$image}");
            return;
        }

        $this->thumbcrop->flush();
        return;
    }

    /**
     * @return Thumbcrop
     */
    public function thumbcrop(): Thumbcrop
    {
        return $this->thumbcrop;
    }
}