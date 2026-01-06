
<?php
if (!isset($query)) {
    return;
}

$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$big = 999999999;
$total_pages = $query->max_num_pages;
?>

<div class="c-pagination">
    <ul class="page-numbers">
        <!-- 前へボタン -->
        <?php if ($paged > 1) : ?>
            <li><a class="prev page-numbers" href="<?php echo get_pagenum_link($paged - 1); ?>"><</a></li>
        <?php else : ?>
            <li><span class="prev page-numbers disabled"><</span></li>
        <?php endif; ?>

        <!-- ページ番号 -->
        <?php
        echo paginate_links(array(
            'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format'    => '?paged=%#%',
            'current'   => max(1, $paged),
            'total'     => $total_pages,
            'prev_next' => false,
            'type'      => 'plain',
            'end_size'  => 1,
            'mid_size'  => 2,
        ));
        ?>

        <!-- 次へボタン -->
        <?php if ($paged < $total_pages) : ?>
            <li><a class="next page-numbers" href="<?php echo get_pagenum_link($paged + 1); ?>">></a></li>
        <?php else : ?>
            <li><span class="next page-numbers disabled">></span></li>
        <?php endif; ?>
    </ul>
</div>
