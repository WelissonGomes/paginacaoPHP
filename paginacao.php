<?php

// Include the paginate() function
function paginate($current_page, $total_records, $limit, $base_url, $max_pages_to_display = 4) {
    $total_pages = ceil($total_records / $limit);
    $pagination = '<div class="pagination">';

    // Link para a página anterior
    if ($current_page > 1) {
        $pagination .= '<a href="' . $base_url . '?page=' . ($current_page - 1) . '">&laquo; Anterior</a>';
    }

    // Link para a primeira página
    if ($current_page > 1) {
        $pagination .= '<a href="' . $base_url . '?page=1">Primeiro</a>';
    }

    // Início e fim dos links de páginas individuais
    $start = max(1, $current_page - floor($max_pages_to_display / 2));
    $end = min($total_pages, $start + $max_pages_to_display - 1);

    // Ajustar o início caso o fim esteja no limite
    $start = max(1, $end - $max_pages_to_display + 1);

    // Mostrar "..." antes dos números das páginas, se necessário
    if ($start > 1) {
        $pagination .= '<span>...</span>';
    }

    // Links para as páginas individuais
    for ($i = $start; $i <= $end; $i++) {
        if ($i == $current_page) {
            $pagination .= '<span class="active">' . $i . '</span>';
        } else {
            $pagination .= '<a href="' . $base_url . '?page=' . $i . '">' . $i . '</a>';
        }
    }

    // Mostrar "..." após os números das páginas, se necessário
    if ($end < $total_pages) {
        $pagination .= '<span>...</span>';
    }

    // Link para a última página
    if ($current_page < $total_pages) {
        $pagination .= '<a href="' . $base_url . '?page=' . $total_pages . '">Último</a>';
    }

    // Link para a próxima página
    if ($current_page < $total_pages) {
        $pagination .= '<a href="' . $base_url . '?page=' . ($current_page + 1) . '">Próximo &raquo;</a>';
    }

    $pagination .= '</div>';

    return $pagination;
}
?>
