<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2015 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\modules\gallery\widgets;

/**
 * @inheritdoc
 */
class GalleryPreview extends \humhub\components\Widget
{

    public $gallery;
    public $htmlConf = [];
    public $lightboxDataParent;
    public $lightboxDataGallery;
    
    /**
     * @inheritdoc
     */
    public function run()
    {
        return $this->render('galleryPreview', array('gallery' => $this->gallery, 'lightboxDataParent' => $this->lightboxDataParent, 'lightboxDataGallery' => $this->lightboxDataGallery, 'htmlConf' => $this->htmlConf));
    }

}
