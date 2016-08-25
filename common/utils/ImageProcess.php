<?php

namespace common\utils;

use Imagine\Image\Box;
use Imagine\Image\ImageInterface;
use Imagine\Image\Point;
use yii\base\Exception;
use yii\imagine\Image;

class ImageProcess {

    /**
     * This method receives an Imagine Image object and resizes it to the indicated size on the specified coordinates
     *
     * @param ImageInterface
     * @param $x Box X start position
     * @param $y Box Y start position
     * @param $width Width of the crop
     * @param $height Height of the crop
     * @return  If the picture is invalid or X and Y coordinates are wrong (minus 0)
     * @throws Exception If the picture is invalid or X and Y coordinates are wrong (minus 0)
     */
    public static function crop(ImageInterface $picture, $x, $y, $width, $height)
    {
        if (!$picture instanceof ImageInterface)
            self::throwWrongObjectException($picture);
        if ($x < 0 || $y < 0)
            throw new Exception("X and Y can only be greater than 0");
        return $picture->crop(new Point($x, $y), new Box($width, $height));
    }

    /**
     * Reshapes any picture to a square of the desired size.
     * It will crop the picture from the center
     *
     * @param ImageInterface $picture
     * @param $size
     */
    public static function reshapeProfilePicture(ImageInterface $picture, $size)
    {
        if (!$picture instanceof ImageInterface)
            self::throwWrongObjectException($picture);
        $center = new Point\Center($picture->getSize());
    }

    public static function throwWrongObjectException($object)
    {
        throw new Exception("Invalid object, expected ImageInterface, got ".get_class($object));
    }
    
}