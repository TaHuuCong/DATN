<?php
    $link_limit = 4;
?>


@if ($paginator->lastPage() > 1)
    <ul class="pagination">
        @if ($paginator->currentPage() != 1)
            <li>
                <a href="{{ $paginator->url(1) }}">Đầu</a>
            </li>
            <li>
                <a href="{!! str_replace('/?','?',$paginator->url($paginator->currentPage() - 1)) !!}">&laquo;</a>
            </li>
        @endif

        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <?php
                $half_total_links = floor($link_limit / 2);
                $from = $paginator->currentPage() - $half_total_links;
                $to = $paginator->currentPage() + $half_total_links;
                if ($paginator->currentPage() < $half_total_links) {
                   $to += $half_total_links - $paginator->currentPage();
                }
                if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                    $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
                }
            ?>
            @if ($from < $i && $i < $to)
                <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                    <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
                </li>
            @endif
        @endfor

        @if ($paginator->currentPage() != $paginator->lastPage())
            <li>
                <a href="{!! str_replace('/?','?',$paginator->url($paginator->currentPage() + 1)) !!}">&raquo;</a>
            </li>
            <li>
                <a href="{{ $paginator->url($paginator->lastPage()) }}">Cuối</a>
            </li>
        @endif
    </ul>
@endif
<script>
    $(document).ready(function(){
        $('.disabled').click(function(){
            return false;
        });
    });
</script>