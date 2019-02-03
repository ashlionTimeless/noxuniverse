<aside class="main-sidebar">

    <section class="sidebar">
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [

//                    ['label' => 'Add/Remove/Edit User', 'icon' => 'folder', 'url' => ['/user'], 'active' => $this->context->id == 'user'],

                    ['label' => 'Messages', 'icon' => 'folder', 'url' => ['/message/index'], 'active' => $this->context->id == 'message'],
  //                  ['label' => 'Add/Remove/Edit Provider', 'icon' => 'folder', 'url' => ['/provider/create'], 'active' => $this->context->id == 'provider/create'],

                    ['label' => 'News', 'icon' => 'folder', 'url' => ['/article/index'], 'active' => $this->context->id == 'article'],

                    ['label' => 'Events', 'icon' => 'folder', 'url' => ['/event/index'], 'active' => $this->context->id == 'event'],
                    ['label' => 'Team', 'icon' => 'folder', 'url' => ['/teammate/index'], 'active' => $this->context->id == 'teammate'],
                    ['label' => 'Partners', 'icon' => 'folder', 'url' => ['/partner/index'], 'active' => $this->context->id == 'partner'],
                ],
            ]
        ) ?>

    </section>

</aside>
