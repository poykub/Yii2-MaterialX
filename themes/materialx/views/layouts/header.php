<?php

use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use yii\bootstrap\Html;

$username = '';
if (!Yii::$app->user->isGuest) {
    $username = '(' . Html::encode(Yii::$app->user->identity->username) . ')';
}

NavBar::begin([
    'brandLabel' => '<span class="glyphicon glyphicon-th-large"></span>',
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-fixed-top navbar-info kanit',
    ],
]);

if (Yii::$app->user->isGuest) {
    $submenuItems[] = ['label' => 'Register', 'url' => ['/user/registration/register']];
    $submenuItems[] = ['label' => 'Login', 'url' => ['/user/security/login']];
} else {
    if (Yii::$app->user->can('admin')) {
        $submenuItems[] = [
            'label' => 'Setting',
            'url' => ['/setting/index'],
            //'linkOptions' => ['target' => '_blank']
        ];
        $submenuItems[] = [
            'label' => 'User Management',
            'url' => ['/user/admin/index'],
            'linkOptions' => [ ]
        ];
        $submenuItems[] = [
            'label' => 'Permission',
            'url' => ['/rbac'],
            'linkOptions' => [ ]
        ];
    }
    $submenuItems[] = [
        'label' => 'Profile',
        'url' => ['/user/settings/profile'],
        'linkOptions' => ['']
    ];
    $submenuItems[] = [
        'label' => 'Logout',
        'url' => ['/user/security/logout'],
        'linkOptions' => ['data-method' => 'post']
    ];
}

$rpt_mnu_itms[] = ['label' => '<i class="glyphicon glyphicon-unchecked"></i> ข้อมูลพื้นฐาน', 'url' => ['/base-data/index']];

$rpt_mnu_itms[] = ['label' => '<i class="glyphicon glyphicon-list-alt"></i> ระบบรายงาน', 'url' => ['#!']];

//$rpt_mnu_itms[] = ['label' => '<i class="glyphicon glyphicon-list-alt"></i> ระบบ HDC DATA-Exchange', 'url' => ['/hdcex/default/index']];

//$rpt_mnu_itms[] = ['label' => '<i class="glyphicon glyphicon-list-alt"></i> ระบบข้อมูลแผนที่(GIS)', 'url' => ['/gis/default/index']];

//$rpt_mnu_itms[] = ['label' => '<i class="glyphicon glyphicon-list-alt"></i> ระบบรายงาน(SQL)', 'url' => ['/sqlscript/index']];


/*if (!Yii::$app->user->isGuest) {
    $rpt_mnu_itms[] = ['label' => '<i class="glyphicon glyphicon-retweet"></i> คำสั่ง SQL', 'url' => ['/runquery/index']];
    $rpt_mnu_itms[] = ['label' => '<i class="glyphicon glyphicon-floppy-saved"></i> โปรแกรมตัดข้อมูล', 'url' => ['/site/download']];
}*/


$menuItems = [
    ['label' =>
        '<i class="glyphicon glyphicon-home"></i> Home',
        'url' => Yii::$app->homeUrl,
    ],
    ['label' => '<i class="glyphicon glyphicon-user"></i> Account '.$username,
        'items' => $submenuItems
    ],
    ['label' => 'About', 'url' => ['/site/about']],
];

echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-left'],
    'encodeLabels' => false,
    'items' => [
        [
            'label' => 'Material X',//'url' => ['/site/index']
        ]
    ],
]);

echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'encodeLabels' => false,
    'items' => $menuItems,
]);

echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'encodeLabels' => false,
]);

NavBar::end();