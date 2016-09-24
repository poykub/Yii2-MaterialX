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

$rpt_mnu_itms[] = ['label' => '<i class="glyphicon glyphicon-unchecked"></i> Link 1', 'url' => ['#!']];

$rpt_mnu_itms[] = ['label' => '<i class="glyphicon glyphicon-list-alt"></i> Link 2', 'url' => ['#!']];


/*if (!Yii::$app->user->isGuest) {
    $rpt_mnu_itms[] = ['label' => '<i class="glyphicon glyphicon-retweet"></i> Link 1', 'url' => ['#!']];
    $rpt_mnu_itms[] = ['label' => '<i class="glyphicon glyphicon-floppy-saved"></i> Link 2', 'url' => ['#!']];
}*/

$menuItems = [
    ['label' =>
        '<i class="glyphicon glyphicon-home"></i> Home',
        'url' => Yii::$app->homeUrl,
    ],
    ['label' => '<i class="glyphicon glyphicon-list"></i> Sub menu ',
        'items' => $rpt_mnu_itms
    ],
    ['label' => '<i class="glyphicon glyphicon-user"></i> Account '.$username,
        'items' => $submenuItems
    ],
    ['label' => '<i class="glyphicon glyphicon-grain"></i> About', 'url' => ['/site/about']],
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