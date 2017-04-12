<?php

use \humhub\modules\comment\widgets\CommentLink;
use \humhub\modules\gallery\assets\Assets;
use \humhub\modules\like\widgets\LikeLink;
use \yii\helpers\Html;

$bundle = Assets::register($this);
?>

<div class="col-sm-4 gallery-list-entry">
    <div class="panel panel-default <?= $shadowPublic ?>">
        <div class="panel-body">
            <a class="zoom" 
               href="<?= $fileUrl ?>#.jpeg" 
               <?php if ($uiGalleryId): ?>
                   data-type="image" 
                   data-toggle="lightbox" 
                   data-parent="#gallery-content"
                   data-description="<?= $entryDescription ?>"
                   data-ui-gallery="<?= $uiGalleryId ?>"
               <?php endif; ?>>
                <img src="<?= $thumbnailUrl ?>" /><span class="overlay"><i class="glyphicon glyphicon-fullscreen"></i></span>
            </a>
        </div>
        <div class="panel-heading overlay">
            <?php if ($creatorUrl || $creatorThumbnailUrl): ?>
                <div class="pull-left" style="margin-right:4px;">
                    <a href="<?= $creatorUrl ?>">
                        <img class="img-rounded tt img_margin"
                             src="<?= $creatorThumbnailUrl ?>"
                             width="21" height="21" alt="21x21" data-src="holder.js/21x21"
                             style="width: 21px; height: 21px;"
                             data-original-title="<?php echo Yii::t('CfilesModule.base', 'added by ') . $creatorName ?>"
                             data-placement="top" title="" data-toggle="tooltip">
                    </a>
                </div>
            <?php endif; ?>
            <div class="pull-left truncate tt" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?= Html::encode($entryTitle) ?>">
                <?= Html::encode($entryTitle); ?>
            </div>
            <div class="pull-right">
                <ul class="nav nav-pills preferences">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu pull-right">
                            <?php if ($wallUrl): ?>
                                <li>
                                    <a href="<?= $wallUrl ?>"><i class="fa fa-link"></i> <?= Yii::t('GalleryModule.base', 'Show connected post') ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if ($writeAccess): ?>
                                <?php if ($deleteUrl): ?>
                                    <li>
                                        <a data-target="#globalModal" href="<?= $deleteUrl ?>"><i class="fa fa-trash"></i> <?= Yii::t('GalleryModule.base', 'Delete') ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if ($editUrl): ?>
                                    <li>
                                        <a data-target="#globalModal" href="<?= $editUrl ?>"><i class="fa fa-edit"></i> <?= Yii::t('GalleryModule.base', 'Edit') ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if ($downloadUrl): ?>
                                <li>
                                    <a data-pjax-prevent="1" href="<?= $downloadUrl ?>"><i class="fa fa-download"></i> <?= Yii::t('GalleryModule.base', 'Download') ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>        
        <div class="panel-footer overlay">
            <div class="social-activities colorFont5">
                <?php if ($footerOverwrite): ?>
                    <?= $footerOverwrite ?>
                <?php else: ?>
                    <?= LikeLink::widget(['object' => $contentObject]) ?> | <?= CommentLink::widget(['object' => $contentObject, 'mode' => CommentLink::MODE_POPUP]) ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>