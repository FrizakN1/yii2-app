<main>
    <div class="storage">
        <div class="storage_table">
            <div class="table_bar">
                <div class="bar_element_h journal">Дата</div>
                <div class="bar_element_h journal">Наименование продукта</div>
                <div class="bar_element_h journal">Категория</div>
                <div class="bar_element_h journal">Движения</div>
            </div>
            <?php
            foreach ($result as $item) {
                echo '<div class="table_bar">'.
                    '<div class="bar_element journal">'.$item[0].'</div>',
                    '<div class="bar_element journal">'.$item[1].'</div>',
                    '<div class="bar_element journal">'.$item[2].'</div>',
                    '<div class="bar_element journal">'.$item[3].'</div>'
                    .'</div>';
            }
            ?>
        </div>
    </div>
</main>