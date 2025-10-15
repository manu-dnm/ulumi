<?php 
    $tabsComponentTABS = [
        ['name' => 'Ubicación', 'icon' => 'assets/icon-tab-1.png', 'id' => 'para_ti_tab1', 'url' => '/use/body/para_ti_tab1.php'],
        ['name' => 'Exclusividad', 'icon' => 'assets/icon-tab-2.png', 'id' => 'para_ti_tab2', 'url' => '/use/body/para_ti_tab2.php'],
        ['name' => 'Sustentabilidad', 'icon' => 'assets/icon-tab-3.png', 'id' => 'para_ti_tab3', 'url' => '/use/body/para_ti_tab3.php'],
        ['name' => 'Modularidad', 'icon' => 'assets/icon-tab-4.png', 'id' => 'para_ti_tab4', 'url' => '/use/body/para_ti_tab4.php'],
    ];

    $uniqueId = uniqid('tabs_para_ti');
?>

<div class="tabs-container" id="<?= $uniqueId ?>">
    <div class="tabs">
        <?php foreach ($tabsComponentTABS as $index => $tab): ?>
            <button 
                class="tab<?= $index === 0 ? ' active' : '' ?>" 
                data-target="<?= $uniqueId ?>_content<?= $index ?>">
                <img src="<?= $tab['icon'] ?>" alt="">
                <span><?= $tab['name'] ?></span>
            </button>
        <?php endforeach; ?>
    </div>
    <div class="tabs-content">
        <?php foreach ($tabsComponentTABS as $index => $tab): ?>
            <div 
                class="tab-content <?= $index === 0 ? 'active' : '' ?>" 
                id="<?= $uniqueId ?>_content<?= $index ?>">
                <?php include $_SERVER['DOCUMENT_ROOT'] . $tab['url']; ?>
            </div>
        <?php endforeach; ?>
        <div class="cta-wrapper center mt-4">
            <?php include('use/body/cta.php') ?>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const container = document.getElementById('<?= $uniqueId ?>');
    const tabs = container.querySelectorAll('.tab');
    const contents = container.querySelectorAll('.tab-content');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => t.classList.remove('active'));
            contents.forEach(c => c.classList.remove('active'));

            tab.classList.add('active');
            const targetId = tab.getAttribute('data-target');
            container.querySelector('#' + targetId).classList.add('active');
        });
    });
});
</script>
