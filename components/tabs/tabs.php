<?php 
    $tabsComponentTABS = [
        ['name' => 'Tab 1', 'id' => 'tab1', 'url' => '/use/body/tab1.php'],
        ['name' => 'Tab 2', 'id' => 'tab2', 'url' => '/use/body/tab2.php'],
        ['name' => 'Tab 3', 'id' => 'tab3', 'url' => '/use/body/tab3.php'],
    ];

    $uniqueId = uniqid('tabs_TABS');
?>

<div class="tabs-container" id="<?= $uniqueId ?>">
    <div class="tabs">
        <?php foreach ($tabsComponentTABS as $index => $tab): ?>
            <button 
                class="tab<?= $index === 0 ? ' active' : '' ?>" 
                data-target="<?= $uniqueId ?>_content<?= $index ?>">
                <?= $tab['name'] ?>
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
            console.log( 'yey' );
            tabs.forEach(t => t.classList.remove('active'));
            contents.forEach(c => c.classList.remove('active'));

            tab.classList.add('active');
            const targetId = tab.getAttribute('data-target');
            container.querySelector('#' + targetId).classList.add('active');
        });
    });
});
</script>
