<main>
    <div class="storage">
        <div class="storage_table">
            <div class="table_bar">
                <div class="bar_element_h up_width">Наименование продукта</div>
                <div class="bar_element_h category">Категория</div>
                <div class="bar_element_h">Количество</div>
            </div>
            <?php
                foreach ($result as $item) {
                    echo '<div class="table_bar">'.
                            '<div class="bar_element up_width left_pos">'.$item[0].'</div>',
                            '<div class="bar_element category">'.$item[1].'</div>',
                            '<div class="bar_element">'.$item[2].'</div>'
                        .'</div>';
                }
            ?>
        </div>
    </div>
</main>