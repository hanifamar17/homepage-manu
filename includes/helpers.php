<?php
function renderContent(?string $html): void {
    $allowed = '<p><br><strong><em><u><ul><ol><li><h1><h2><h3><a>';
    echo strip_tags($html ?? '', $allowed);
}