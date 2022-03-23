<?php

$home_url = pll_home_url();

?>

<div class="logo logo--header <?php echo ( isset( $args['classes'] ) ) ? $args['classes'] : ''; ?>">
	<a <?=!is_front_page() ? "href='{$home_url}'" : ''; ?>>
        <svg width="189" height="14" fill="none"><path d="M55.51 8.06V5.91h6.6v2.15h-6.6ZM101.07 8.06V5.91h6.6v2.15h-6.6ZM.24 13.58V.44H7.1c3.34 0 5.12 1.27 5.12 4.39 0 3.12-1.8 4.56-5.12 4.56H3.58v4.26l-3.34-.07Zm6.6-7.03c1.48 0 2.36-.36 2.36-1.64 0-1.28-.93-1.64-2.37-1.64H3.58v3.28h3.25ZM14.97 13.58V.44h3.2v13.14h-3.2ZM21.43 13.58V.44h11.24v2.84H24.6v2.34h7.1v2.44h-7.1v2.51h8.34v2.94l-11.5.07ZM36.18 13.58V.44h6.67c5.27 0 7.66 2.8 7.66 6.57 0 3.78-3.04 6.57-7.66 6.57h-6.67Zm6.39-2.9c2.62 0 4.62-1 4.62-3.64 0-2.62-1.79-3.8-4.62-3.8h-3.2v7.43h3.2ZM66.97 13.58V.44h6.68c5.27 0 7.65 2.8 7.65 6.57 0 3.78-3.03 6.57-7.65 6.57h-6.68Zm6.4-2.9c2.61 0 4.61-1 4.61-3.64 0-2.62-1.78-3.8-4.62-3.8h-3.15v7.43h3.15ZM84.54 13.58V.44h11.24v2.84h-8.05v2.34h7.1v2.44h-7.1v2.51h8.34v2.94l-11.53.07ZM112.68 13.58V.44h6.86c3.34 0 5.12 1.27 5.12 4.39 0 3.12-1.8 4.56-5.12 4.56h-3.47v4.26l-3.39-.07Zm6.6-7.03c1.48 0 2.36-.36 2.36-1.64 0-1.28-.93-1.64-2.37-1.64h-3.2v3.28h3.2ZM135.37 13.86c-4.52 0-8.06-2.63-8.06-6.73 0-4.1 3.22-7 8.06-7s8.14 2.9 8.14 7-3.42 6.73-8.14 6.73Zm0-10.79c-2.73 0-4.82 1.53-4.82 4.06 0 2.52 2.14 3.84 4.82 3.84 2.69 0 4.82-1.33 4.82-3.84 0-2.52-2.03-4.06-4.82-4.06ZM156.66.41h3.19v8.11c0 4.07-3.34 5.39-6.68 5.39-3.33 0-6.67-1.33-6.67-5.39V.41h3.15v7.9c0 1.72 1.17 2.72 3.57 2.72s3.56-1 3.56-2.72l-.12-7.9ZM163.06 13.61V.48h3.2v10.3h7.85v2.9l-11.05-.07ZM177.31 13.61V.48h11.25v2.84h-8.15v2.33h7.11v2.44h-7.1v2.63h8.34v2.94l-11.45-.05Z" /></svg>
	</a>
</div>