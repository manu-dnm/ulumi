<?php 
    $uniqueId = uniqid('villa_TABS');
    $tabsComponentTABS = [
        ['name' => 'Villa Izquierda', 'id' => 'villa_tab1', 'url' => '/use/body/tab_villas_1.php'],
        ['name' => 'Villa Central', 'id' => 'villa_tab2', 'url' => '/use/body/tab_villas_2.php'],
        ['name' => 'Villa Derecha', 'id' => 'villa_tab3', 'url' => '/use/body/tab_villas_3.php'],
    ];

?>

<div class="tabs-container villas" id="<?= $uniqueId ?>">
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
